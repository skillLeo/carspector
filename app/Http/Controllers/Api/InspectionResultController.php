<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\InspectionResultArrivedMail;
use App\Models\ExaminationImage;
use App\Models\InspectionSubmission;
use App\Models\Order;
use App\Models\OrderExamination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InspectionResultController extends Controller
{
    /**
     * Document types we can route automatically.
     * Unknown types are saved to examination-documents with type 'unclassified'.
     */
    private const KNOWN_DOCUMENT_TYPES = [
        'photo_documentation',
        'diagnostic_report',
        'inspection_report',
        'cost_estimate',
        'vehicle_certificate',
        'other',
    ];

    public function receive(Request $request): JsonResponse
    {
        $ip = $request->ip();

        // ── Step 1: Validate structure ───────────────────────────────────────
        $validation = $this->validateRequest($request);
        if ($validation !== null) {
            InspectionSubmission::log([
                'raw_order_ref' => $request->input('order_id'),
                'ip_address'    => $ip,
                'status'        => 'validation_error',
                'error_message' => $validation,
            ]);
            return response()->json(['success' => false, 'error' => $validation], 422);
        }

        // ── Step 2: Resolve order ────────────────────────────────────────────
        $order = $this->resolveOrder((string) $request->input('order_id'));
        if (!$order) {
            $msg = 'Order not found: ' . $request->input('order_id');
            InspectionSubmission::log([
                'raw_order_ref' => $request->input('order_id'),
                'ip_address'    => $ip,
                'status'        => 'validation_error',
                'error_message' => $msg,
            ]);
            return response()->json(['success' => false, 'error' => $msg], 404);
        }

        // ── Step 3: Process inside a transaction ─────────────────────────────
        $savedFiles    = [];
        $documentsInfo = [];

        try {
            DB::transaction(function () use ($request, $order, &$savedFiles, &$documentsInfo) {
                $examination = $this->ensureExamination($order);

                // Save any structured inspection data fields
                if ($request->has('inspection_data')) {
                    $this->applyInspectionData($examination, (array) $request->input('inspection_data'));
                }

                // Process each document
                $documents = $request->input('documents', []);
                $nextDocOrder = (int) ExaminationImage::where('examination_id', $examination->id)->max('sort_order') + 1;

                foreach ($documents as $index => $doc) {
                    $result = $this->processDocument($doc, $order, $examination, $nextDocOrder, $index);
                    if ($result) {
                        $savedFiles[]    = $result['saved'];
                        $documentsInfo[] = $result['info'];
                        $nextDocOrder++;
                    }
                }

                // Update order status to Fertigstellung — data arrived, awaiting team review
                $order->admin_status = 'Fertigstellung';
                $order->status       = 'inspecting';
                $order->saveQuietly();
            });
        } catch (\Throwable $e) {
            Log::error('InspectionResult: transaction failed', [
                'order_id' => $order->id,
                'error'    => $e->getMessage(),
                'trace'    => $e->getTraceAsString(),
            ]);

            InspectionSubmission::log([
                'order_id'           => $order->id,
                'raw_order_ref'      => $request->input('order_id'),
                'ip_address'         => $ip,
                'status'             => 'failed',
                'error_message'      => $e->getMessage(),
                'documents_received' => $documentsInfo,
                'files_saved'        => [],
            ]);

            return response()->json([
                'success' => false,
                'error'   => 'Internal error processing submission. Support has been notified.',
            ], 500);
        }

        // ── Step 4: Log success ──────────────────────────────────────────────
        InspectionSubmission::log([
            'order_id'           => $order->id,
            'raw_order_ref'      => $request->input('order_id'),
            'ip_address'         => $ip,
            'status'             => 'success',
            'documents_received' => $documentsInfo,
            'files_saved'        => $savedFiles,
        ]);

        // ── Step 5: Notify internal team ─────────────────────────────────────
        $this->notifyTeam($order, $savedFiles);

        return response()->json([
            'success'         => true,
            'message'         => 'Inspection result received and processed.',
            'order_id'        => $order->orderno,
            'documents_saved' => count($savedFiles),
        ], 200);
    }

    // ── Private helpers ──────────────────────────────────────────────────────

    private function validateRequest(Request $request): ?string
    {
        if (!$request->has('order_id') || blank($request->input('order_id'))) {
            return 'Field "order_id" is required.';
        }

        $documents = $request->input('documents');
        if ($documents !== null) {
            if (!is_array($documents)) {
                return 'Field "documents" must be an array.';
            }
            foreach ($documents as $i => $doc) {
                if (!isset($doc['type'])) {
                    return "Document at index {$i} is missing required field \"type\".";
                }
                if (!isset($doc['filename'])) {
                    return "Document at index {$i} is missing required field \"filename\".";
                }
                if (!isset($doc['data'])) {
                    return "Document at index {$i} is missing required field \"data\" (base64 encoded file content).";
                }
                if (!$this->isValidBase64($doc['data'])) {
                    return "Document at index {$i} has invalid base64 data.";
                }
            }
        }

        return null;
    }

    private function resolveOrder(string $id): ?Order
    {
        // Try UUID
        if (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $id)) {
            return Order::where('uuid', $id)->first();
        }
        // Try orderno (e.g. 26051234)
        $byOrderno = Order::where('orderno', $id)->first();
        if ($byOrderno) return $byOrderno;

        // Try numeric ID
        if (ctype_digit($id)) {
            return Order::find((int) $id);
        }

        return null;
    }

    private function ensureExamination(Order $order): OrderExamination
    {
        $examination = OrderExamination::where('order_id', $order->id)->first();
        if (!$examination) {
            $examination = OrderExamination::create(['order_id' => $order->id]);
        }
        return $examination;
    }

    /**
     * Maps every examination step to the DB fields it owns.
     * The first key in each array entry is used as the completed_steps value.
     */
    private const STEP_FIELDS = [
        'examination-condition' => [
            'weather_conditions', 'lighting_conditions', 'vehicle_clean',
            'vehicle_freely_accessible', 'vehicle_exam_condition_comment',
        ],
        'vehicle-data' => [
            'manufacturer', 'model', 'body_type', 'transmission', 'first_registration',
            'fuel', 'color', 'engine_displacement', 'doors', 'power', 'next_hu',
            'km_reading', 'emission_class', 'previous_owners', 'fin',
        ],
        'vehicle-document' => [
            'permits', 'permits_details', 'registration_certificate', 'vehicle_title',
            'owner_manual', 'hu_au_report', 'service_book_type', 'service_book_maintained',
            'service_book_details', 'vehicle_document_overall_comment',
        ],
        'tires' => [
            'vl_type', 'tire_size_1', 'tire_size_2', 'tire_size_3', 'tire_profile',
            'tire_dot', 'vl_comments', 'vr_type', 'vr_tire_size_1', 'vr_tire_size_2',
            'vr_tire_size_3', 'vr_tire_profile', 'vr_tire_dot', 'vr_comments',
            'tires', 'tire_extra', 'tire_extra_size', 'tire_repair_expiry', 'vehicle_tires_comment',
        ],
        'body' => [
            'front_bumper', 'front_bumper_damage', 'rear_bumper', 'rear_bumper_damage',
            'grill', 'grill_damage', 'sill_left', 'sill_left_damage', 'sill_right',
            'sill_right_damage', 'are_gap_ok', 'body_general_comment',
        ],
        'paint-thickness-condition' => [
            'bonnet_thickness_status', 'bonnet_paint_layer_thickness', 'bonnet_repainted', 'bonnet_any_damage', 'bonnet_damages',
            'fender_vr_thickness_status', 'fender_vr_paint_layer_thickness', 'fender_vr_repainted', 'fender_vr_any_damage', 'fender_vr_damages',
            'fender_vl_thickness_status', 'fender_vl_paint_layer_thickness', 'fender_vl_repainted', 'fender_vl_any_damage', 'fender_vl_damages',
            'door_vl_thickness_status', 'door_vl_paint_layer_thickness', 'door_vl_repainted', 'door_vl_any_damage', 'door_vl_damages',
            'door_hl_thickness_status', 'door_hl_paint_layer_thickness', 'door_hl_repainted', 'door_hl_any_damage', 'door_hl_damages',
            'door_vr_thickness_status', 'door_vr_paint_layer_thickness', 'door_vr_repainted', 'door_vr_any_damage', 'door_vr_damages',
            'door_hr_thickness_status', 'door_hr_paint_layer_thickness', 'door_hr_repainted', 'door_hr_any_damage', 'door_hr_damages',
            'quarter_hl_thickness_status', 'quarter_hl_paint_layer_thickness', 'quarter_hl_repainted', 'quarter_hl_any_damage', 'quarter_hl_damages',
            'quarter_hr_thickness_status', 'quarter_hr_paint_layer_thickness', 'quarter_hr_repainted', 'quarter_hr_any_damage', 'quarter_hr_damages',
            'roof_thickness_status', 'roof_paint_layer_thickness', 'roof_repainted', 'roof_any_damage', 'roof_damages',
            'tailgate_thickness_status', 'tailgate_paint_layer_thickness', 'tailgate_repainted', 'tailgate_any_damage', 'tailgate_damages',
            'paint_general_comment',
        ],
        'vehicle-light' => [
            'headlights', 'headlights_damages', 'headlights_damages_other',
            'rear_lights', 'rear_lights_damages', 'rear_lights_damages_other',
            'brake_light', 'brake_light_damages', 'brake_light_damages_other',
            'reverse_light', 'reverse_light_damages', 'reverse_light_damages_other',
            'indicator', 'indicator_damages', 'indicator_damages_other',
            'hazard_lights', 'hazard_lights_damages', 'hazard_lights_damages_other',
            'fog_lights', 'fog_lights_damages', 'fog_lights_damages_other',
            'low_beam', 'low_beam_damages', 'low_beam_damages_other',
            'interior_light', 'interior_light_damages', 'interior_light_damages_other',
            'daytime_running_light', 'daytime_running_light_damages', 'daytime_running_light_damages_other',
            'lights_comment',
        ],
        'external-condition' => [
            'windshield', 'windshield_details', 'windshield_details_other',
            'window_glazing', 'window_glazing_details', 'window_glazing_details_other',
            'wipers', 'wipers_details', 'wipers_details_other',
            'seals', 'seals_details', 'seals_details_other',
            'central_locking', 'central_locking_details', 'central_locking_details_other',
            'attachments', 'attachments_details', 'attachments_details_other',
            'exterior_mirrors', 'exterior_mirrors_details', 'exterior_mirrors_details_other',
            'rims',
            'suspension', 'suspension_details', 'suspension_details_other',
            'shock_absorbers', 'shock_absorbers_details', 'shock_absorbers_details_other',
            'springs', 'springs_details', 'springs_details_other',
            'brake_discs', 'brake_discs_details', 'brake_discs_details_other',
            'brake_pads', 'brake_pads_details', 'brake_pads_details_other',
            'exhaust_system', 'exhaust_system_details', 'exhaust_system_details_other',
            'engine_oil_tightness', 'engine_oil_tightness_details', 'engine_oil_tightness_details_other',
            'gearbox_oil_tightness', 'gearbox_oil_tightness_details', 'gearbox_oil_tightness_details_other',
            'differential_oil_tightness', 'differential_oil_tightness_details', 'differential_oil_tightness_details_other',
            'underbody_condition', 'underbody_condition_details', 'underbody_condition_details_other',
            'other_findings', 'other_findings_details', 'other_findings_details_other',
            'external_overall_comment',
        ],
        'technology' => [
            'engine_oil', 'engine_oil_comment',
            'break_fluid', 'break_fluid_comment',
            'general_engine_component', 'general_engine_component_comment',
            'coolant', 'coolant_comment',
            'next_inspection', 'next_inspection_comment',
            'next_oil_change', 'next_oil_change_comment',
            'technology_overall_comment',
        ],
        'test-drive' => [
            'test_drive_done', 'test_run_done', 'test_drive_overall_comment',
            'td_engine_run', 'td_engine_run_note',
            'td_steering', 'td_steering_note',
            'td_clutch', 'td_clutch_note',
            'td_transmission', 'td_transmission_note',
            'td_speedometer', 'td_speedometer_note',
            'td_brake_feel', 'td_brake_feel_note',
            'td_strange_noises', 'td_strange_noises_note',
            'td_starter', 'td_starter_note',
            'td_timing', 'td_timing_note',
            'tr_starter', 'tr_starter_note',
            'tr_clutch', 'tr_clutch_note',
            'tr_engine_run', 'tr_engine_run_note',
            'tr_strange_noises', 'tr_strange_noises_note',
            'tr_timing', 'tr_timing_note',
            'test_drive_carried_out', 'test_drive_carried_out_comment',
            'engine_running', 'engine_running_comments',
            'coupling', 'coupling_comments',
        ],
        'interior' => [
            'seat_belts', 'seat_belts_detail', 'seat_belts_detail_other',
            'steering_wheel', 'steering_wheel_detail', 'steering_wheel_detail_other',
            'dashboard', 'dashboard_detail', 'dashboard_detail_other',
            'air_conditioning', 'air_conditioning_detail', 'air_conditioning_detail_other',
            'heating_ventilation', 'heating_ventilation_detail', 'heating_ventilation_detail_other',
            'sunroof', 'sunroof_detail', 'sunroof_detail_other',
            'controls', 'controls_detail', 'controls_detail_other',
            'window_lifters', 'window_lifters_detail', 'window_lifters_detail_other',
            'rearview_mirror', 'rearview_mirror_detail', 'rearview_mirror_detail_other',
            'seats', 'seats_detail', 'seats_detail_other',
            'glove_box', 'glove_box_detail', 'glove_box_detail_other',
            'radio', 'radio_detail', 'radio_detail_other',
            'floor', 'floor_detail', 'floor_detail_other',
            'paneling', 'paneling_detail', 'paneling_detail_other',
            'headliner', 'headliner_detail', 'headliner_detail_other',
            'horn', 'horn_detail', 'horn_detail_other',
            'smell', 'smell_detail_other',
            'interior_overall_comment',
        ],
        'other-conclusion' => [
            'error_in_instrument_cluster', 'error_in_instrument_cluster_note', 'error_in_instrument_cluster_comments',
            'error_in_error_memory', 'error_in_error_memory_note', 'error_in_error_memory_comments',
            'known_accident_damage_status', 'known_accident_damage_note', 'known_accident_damage_comments',
            'repainting_comments', 'conclusion', 'conclusion_en', 'other_en',
        ],
    ];

    private function applyInspectionData(OrderExamination $examination, array $data): void
    {
        // Build flat field → step map from STEP_FIELDS
        $fieldToStep = [];
        foreach (self::STEP_FIELDS as $stepKey => $fields) {
            foreach ($fields as $f) {
                $fieldToStep[$f] = $stepKey;
            }
        }

        // JSON-cast fields (arrays) — must not be set as plain strings
        $jsonCastFields = array_keys(array_filter(
            $examination->getCasts(),
            fn($type) => $type === 'array'
        ));

        $stepsWithData = [];

        foreach ($data as $field => $value) {
            // Skip fields not in the whitelist
            if (!isset($fieldToStep[$field])) {
                continue;
            }
            // Skip empty values (but allow 0 and false)
            if ($value === null || $value === '') {
                continue;
            }
            // JSON-cast fields must be arrays
            if (in_array($field, $jsonCastFields, true) && !is_array($value)) {
                continue;
            }

            $examination->$field = $value;
            $stepsWithData[$fieldToStep[$field]] = true;
        }

        // Mark steps that received data as completed
        $completed = is_array($examination->completed_steps) ? $examination->completed_steps : [];
        foreach (array_keys($stepsWithData) as $stepKey) {
            if (!in_array($stepKey, $completed, true)) {
                $completed[] = $stepKey;
            }
        }
        $examination->completed_steps = $completed;

        $examination->save();
    }

    private function processDocument(array $doc, Order $order, OrderExamination $examination, int $sortOrder, int $index): ?array
    {
        $type     = trim((string) ($doc['type'] ?? ''));
        $filename = trim((string) ($doc['filename'] ?? ''));
        $rawData  = $doc['data'] ?? '';

        $decoded = base64_decode($rawData, true);
        if ($decoded === false || strlen($decoded) === 0) {
            Log::warning('InspectionResult: failed to decode document', ['index' => $index, 'type' => $type]);
            return null;
        }

        $ext        = strtolower(pathinfo($filename, PATHINFO_EXTENSION)) ?: 'bin';
        $isImage    = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true);
        $timestamp  = now()->format('Ymd_His');
        $safeType   = preg_replace('/[^a-z0-9_]/', '_', strtolower($type));
        $newFilename = "order_{$order->id}_{$safeType}_{$timestamp}_{$index}.{$ext}";

        if ($isImage) {
            $dir     = 'examination-images';
            $docType = null; // null = photo, appears in photo grid
        } else {
            $dir     = 'examination-documents';
            $docType = in_array($type, self::KNOWN_DOCUMENT_TYPES, true) ? $type : 'unclassified';
        }

        $relativePath = $dir . '/' . $newFilename;
        Storage::disk('public')->put($relativePath, $decoded);

        $record = ExaminationImage::create([
            'examination_id' => $examination->id,
            'image'          => $relativePath,
            'document_type'  => $docType,
            'sort_order'     => $sortOrder,
        ]);

        return [
            'saved' => [
                'examination_image_id' => $record->id,
                'type'                 => $docType ?? 'image',
                'path'                 => $relativePath,
                'disk'                 => 'public',
            ],
            'info' => [
                'type'       => $type,
                'filename'   => $filename,
                'size_bytes' => strlen($decoded),
            ],
        ];
    }

    private function notifyTeam(Order $order, array $savedFiles): void
    {
        $to = env('INSPECTION_RESULT_NOTIFY_EMAIL', env('INSPECTION_PARTNER_EMAIL', 'info@carspector.de'));
        try {
            Mail::to($to)->send(new InspectionResultArrivedMail($order, $savedFiles));
        } catch (\Throwable $e) {
            Log::error('InspectionResult: failed to send team notification email', [
                'order_id' => $order->id,
                'error'    => $e->getMessage(),
            ]);
        }
    }

    private function isValidBase64(string $str): bool
    {
        if (empty($str)) return false;
        // Strip data URI prefix if present (e.g. "data:application/pdf;base64,...")
        if (str_contains($str, ',')) {
            $str = substr($str, strpos($str, ',') + 1);
        }
        return base64_decode($str, true) !== false;
    }
}
