<?php

namespace App\Http\Controllers;

use App\Mail\CityMail;
use App\Mail\ContactMessage;
use App\Mail\ExaminationMail;
use App\Mail\ExaminationStatusMail;
use App\Mail\NewBookingMail;
use App\Mail\PdfOrder;
use App\Mail\StadPlzMail;
use App\Mail\VortileMail;
use App\Models\AvailibiltyTime;
use App\Models\City;
use App\Models\ExaminationImage;
use App\Models\ExaminerAvailability;
use App\Models\Order;
use App\Models\OrderExamination;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class FrontPageController extends Controller
{
    public function index(){
        return view('frontpages.index');
    }

    public function orderPdf($number)
    {
        $order = Order::where('pdf_number', $number)->first();
//        dd($order->partnerLogo);
        if ($order) {
            $examination = OrderExamination::where('order_id', $order->id)->first();
            $includes = [];
            // Build cached, compressed images for faster PDF rendering
            $images = collect();
            if ($examination) {
                $cacheDirRel = 'pdf-cache/' . $order->id; // relative to storage/app/public
                $cacheDirAbs = storage_path('app/public/' . $cacheDirRel);
                @mkdir($cacheDirAbs, 0775, true);

                foreach (($examination->images ?? []) as $img) {
                    try {
                        $raw = ltrim((string)($img->image ?? ''), '/');
                        $rel = $raw !== '' ? $raw : ltrim(parse_url($img->image1 ?? '', PHP_URL_PATH) ?: '', '/');
                        if ($rel === '') { continue; }
                        if (strpos($rel, 'storage/') === 0) { $rel = substr($rel, 8); }
                        $ext = strtolower(pathinfo($rel, PATHINFO_EXTENSION));
                        $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);

                        if ($isImage) {
                            $srcAbs = storage_path('app/public/' . $rel);
                            $baseName = pathinfo($rel, PATHINFO_FILENAME);
                            $dstRel = $cacheDirRel . '/' . $baseName . '-720p.jpg';
                            $dstAbs = storage_path('app/public/' . $dstRel);
                            if (!file_exists($dstAbs)) {
                                $this->compressForPdf($srcAbs, $dstAbs, 1280, 720, 70);
                            }
                            $obj = (object) [
                                'image' => $dstRel,
                                'document_type' => null,
                            ];
                            $images->push($obj);
                        } else {
                            // Non-image documents: pass through unchanged
                            $images->push($img);
                        }
                    } catch (\Throwable $e) {
                        $images->push($img);
                    }
                }
            }

            if ($examination) { $examination->load('translation'); }
            $damages = \App\Models\OrderDamage::where('order_id', $order->id)->orderBy('id')->get();
            $damageSummary = \App\Models\OrderDamageSummary::where('order_id', $order->id)->first();
            $chartDataUri = app(\App\Services\OrderPdfService::class)->chartDataUri($order, $damages, $damageSummary);
            $pdf = PDF::loadView('frontpages.vehicle.pdf', compact('examination', 'includes', 'order', 'images', 'damages', 'damageSummary', 'chartDataUri'));
            // Ensure DomPDF PHP scripts run (for page numbers) and tweak performance
//            if (method_exists($pdf, 'setOptions')) {
//                $pdf->setOptions([
//                    'isPhpEnabled' => true,
//                    'isRemoteEnabled' => true,
//                    'dpi' => 110,
//                ]);
//            } else if (method_exists($pdf, 'set_option')) {
//                $pdf->set_option('isPhpEnabled', true);
//                $pdf->set_option('isRemoteEnabled', true);
                $pdf->set_option('dpi', 110);
//            }


//            $pdf->render();
            // Stream inline (preview in browser)
            return $pdf->stream('examination-report.pdf', ['Attachment' => false]);
        }

    }

    public function orderPdfEn($number)
    {
        $order = Order::where('pdf_number', $number)->first();
        if ($order) {
            $examination = OrderExamination::where('order_id', $order->id)->first();
            $includes = [];
            // Build cached, compressed images for faster PDF rendering
            $images = collect();
            if ($examination) {
                $cacheDirRel = 'pdf-cache/' . $order->id;
                $cacheDirAbs = storage_path('app/public/' . $cacheDirRel);
                @mkdir($cacheDirAbs, 0775, true);

                foreach (($examination->images ?? []) as $img) {
                    try {
                        $raw = ltrim((string)($img->image ?? ''), '/');
                        $rel = $raw !== '' ? $raw : ltrim(parse_url($img->image1 ?? '', PHP_URL_PATH) ?: '', '/');
                        if ($rel === '') { continue; }
                        if (strpos($rel, 'storage/') === 0) { $rel = substr($rel, 8); }
                        $ext = strtolower(pathinfo($rel, PATHINFO_EXTENSION));
                        $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);

                        if ($isImage) {
                            $srcAbs = storage_path('app/public/' . $rel);
                            $baseName = pathinfo($rel, PATHINFO_FILENAME);
                            $dstRel = $cacheDirRel . '/' . $baseName . '-720p.jpg';
                            $dstAbs = storage_path('app/public/' . $dstRel);
                            if (!file_exists($dstAbs)) {
                                $this->compressForPdf($srcAbs, $dstAbs, 1280, 720, 70);
                            }
                            $obj = (object) [
                                'image' => $dstRel,
                                'document_type' => null,
                            ];
                            $images->push($obj);
                        } else {
                            $images->push($img);
                        }
                    } catch (\Throwable $e) {
                        $images->push($img);
                    }
                }
            }

            if ($examination) { $examination->load('translation'); }
            $damages = \App\Models\OrderDamage::where('order_id', $order->id)->orderBy('id')->get();
            $damageSummary = \App\Models\OrderDamageSummary::where('order_id', $order->id)->first();
            $chartDataUri = app(\App\Services\OrderPdfService::class)->chartDataUri($order, $damages, $damageSummary);
            $pdf = PDF::loadView('frontpages.vehicle.pdf_en', compact('examination', 'includes', 'order', 'images', 'damages', 'damageSummary', 'chartDataUri'));
            $pdf->set_option('dpi', 110);
            return $pdf->stream('examination-report-en.pdf', ['Attachment' => false]);
        }
    }
    private function compressForPdf(string $srcAbs, string $dstAbs, int $maxWidth = 1280, int $maxHeight = 720, int $quality = 70): void
    {
        try {
            if (!file_exists($srcAbs)) return;
            // Load image
            $info = @getimagesize($srcAbs);
            if (!$info) return;
            $mime = $info['mime'] ?? '';
            switch ($mime) {
                case 'image/jpeg': $im = @imagecreatefromjpeg($srcAbs); break;
                case 'image/png':  $im = @imagecreatefrompng($srcAbs); break;
                case 'image/gif':  $im = @imagecreatefromgif($srcAbs); break;
                case 'image/webp': if (function_exists('imagecreatefromwebp')) { $im = @imagecreatefromwebp($srcAbs); } else { $im = null; } break;
                default: $im = null; break;
            }
            if (!$im) return;
            $w = imagesx($im); $h = imagesy($im);
            $scale = min(
                1.0,
                $maxWidth > 0 ? ($maxWidth / $w) : 1.0,
                $maxHeight > 0 ? ($maxHeight / $h) : 1.0
            );
            $nw = (int)round($w * $scale); $nh = (int)round($h * $scale);
            $out = imagecreatetruecolor($nw, $nh);
            // Fill white background for formats with transparency
            $white = imagecolorallocate($out, 255, 255, 255);
            imagefilledrectangle($out, 0, 0, $nw, $nh, $white);
            imagecopyresampled($out, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
            // Ensure directory
            @mkdir(dirname($dstAbs), 0775, true);
            @imagejpeg($out, $dstAbs, max(10, min(95, $quality)));
            imagedestroy($im); imagedestroy($out);
        } catch (\Throwable $e) {
            // swallow errors; fallback is original image
        }
    }

    private function processExaminationImageUpload($file, string $dstAbs, int $maxWidth = 1600, int $maxHeight = 1200, int $quality = 85): void
    {
        $img = $this->imageManager()->read($file);
        $img->scaleDown(width: $maxWidth, height: $maxHeight);
        $img->toJpeg(quality: $quality)->save($dstAbs);
    }

    private function imageManager(): ImageManager
    {
        return new ImageManager(new Driver());
    }
    public function storeExaminationImages(Request $request)
    {
        $order=Order::find($request->id);
        $examination=OrderExamination::where('order_id',$order->id)->first();


        if(!$examination){
            $examination=new OrderExamination();
        }
        $examination->order_id=$request->id;
        // Ensure we have an id to attach images
        if (!$examination->id) { $examination->save(); }
        $created = [];
        $files = $request->file('photos');
        if ($files) {
            if (!is_array($files)) { $files = [$files]; }
            // determine current max for images subset
            $maxOrder = ExaminationImage::where('examination_id', $examination->id)
                ->where(function($q){
                    $q->whereIn(DB::raw('LOWER(SUBSTRING_INDEX(image, ".", -1))'), ['jpg','jpeg','png','gif','webp']);
                })
                ->max('sort_order');
            $nextOrder = (int)($maxOrder ?? 0) + 1;
            foreach ($files as $photo){
                // Compress/orientate using Intervention Image
                $dirRel = 'examination-images';
                $fileRel = $dirRel . '/' . Str::uuid() . '.jpg';
                $dstAbs = storage_path('app/public/' . $fileRel);
                @mkdir(dirname($dstAbs), 0775, true);

                try {
                    $this->processExaminationImageUpload($photo, $dstAbs);
                } catch (\Throwable $e) {
                    Log::warning('Intervention image processing failed for examination photo upload.', [
                        'order_id' => $order->id ?? null,
                        'examination_id' => $examination->id ?? null,
                        'original_name' => $photo->getClientOriginalName(),
                        'target_path' => $fileRel,
                        'error' => $e->getMessage(),
                    ]);
                    // Fallback: move without processing
                    $photo->storeAs('public', $fileRel);
                }

                $image=new ExaminationImage();
                $image->examination_id=$examination->id;
                $image->image=$fileRel; // save relative storage path
                $image->sort_order = $nextOrder++;
                // document_type is only for non-image documents; leave null for photos
                $image->save();
                $created[] = [
                    'id' => $image->id,
                    'image1' => $image->image1,
                    'document_type' => $image->document_type,
                ];
            }
        }
        $completedSteps = $examination->completed_steps ?? [];

        if (!in_array($request->form, $completedSteps)) {
            $completedSteps[] = $request->form;
            $examination->completed_steps = $completedSteps;
        }
        $examination->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'items' => $created,
            ]);
        }

        return redirect()->back()->with(['success'=>'Image uploaded successfully']);


    }
    public function deleteExaminationImage($id)
    {
        $image=ExaminationImage::find($id);
        if($image){
            $image->delete();

            return redirect()->back()->with(['success'=>'Image deleted successfully']);
        }

    }
    public function storeExaminationDocuments(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:orders,id',
            'pdfs.*' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,jpg,jpeg,png,gif,webp',
        ]);


        $order = Order::find($request->id);
        $examination = OrderExamination::where('order_id', $order->id)->first();
        if (!$examination) {
            $examination = new OrderExamination();
            $examination->order_id = $order->id;
            $examination->save();
        } elseif (!$examination->id) {
            $examination->save();
        }

        $created = [];
        $files = $request->file('file');
        if ($files) {
            if (!is_array($files)) { $files = [$files]; }
            // current max sort_orders for each subset
            $maxImgOrder = ExaminationImage::where('examination_id', $examination->id)
                ->where(function($q){ $q->whereIn(DB::raw('LOWER(SUBSTRING_INDEX(image, ".", -1))'), ['jpg','jpeg','png','gif','webp']); })
                ->max('sort_order');
            $nextImgOrder = (int)($maxImgOrder ?? 0) + 1;
            $maxDocOrder = ExaminationImage::where('examination_id', $examination->id)
                ->where(function($q){ $q->whereNotIn(DB::raw('LOWER(SUBSTRING_INDEX(image, ".", -1))'), ['jpg','jpeg','png','gif','webp']); })
                ->max('sort_order');
            $nextDocOrder = (int)($maxDocOrder ?? 0) + 1;
            foreach ($files as $file) {
                $mime = strtolower((string)$file->getMimeType());
                $ext = strtolower((string)$file->getClientOriginalExtension());
                $isImage = (strpos($mime, 'image/') === 0) || in_array($ext, ['jpg','jpeg','png','gif','webp']);

                if ($isImage) {
                    // Treat as image: compress with Intervention and save into images directory
                    $dirRel = 'examination-images';
                    $fileRel = $dirRel . '/' . Str::uuid() . '.jpg';
                    $dstAbs = storage_path('app/public/' . $fileRel);
                    @mkdir(dirname($dstAbs), 0775, true);
                    try {
                        $this->processExaminationImageUpload($file, $dstAbs);
                    } catch (\Throwable $e) {
                        Log::warning('Intervention image processing failed for examination document image upload.', [
                            'order_id' => $order->id ?? null,
                            'examination_id' => $examination->id ?? null,
                            'original_name' => $file->getClientOriginalName(),
                            'target_path' => $fileRel,
                            'error' => $e->getMessage(),
                        ]);
                        $file->storeAs('public', $fileRel);
                    }
                    $doc = new ExaminationImage();
                    $doc->examination_id = $examination->id;
                    $doc->image = $fileRel;
                    $doc->sort_order = $nextImgOrder++;
                    // Keep document_type null for images, to appear under images grid
                    $doc->save();
                    $created[] = [
                        'id' => $doc->id,
                        'image1' => $doc->image1,
                        'document_type' => $doc->document_type,
                        'is_image' => true,
                    ];
                } else {
                    // Non-image documents: store as-is
                    $path = $file->store('examination-documents', 'public');
                    $doc = new ExaminationImage();
                    $doc->examination_id = $examination->id;
                    $doc->image = $path;
                    $selType = trim((string)$request->input('document_type'));
                    $autoType = in_array($ext, ['pdf','doc','docx','xls','xlsx','csv']) ? $ext : 'document';
                    $doc->document_type = $selType !== '' ? $selType : $autoType;
                    $doc->sort_order = $nextDocOrder++;
                    $doc->save();
                    $created[] = [
                        'id' => $doc->id,
                        'image1' => $doc->image1,
                        'document_type' => $doc->document_type,
                        'is_image' => false,
                    ];
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'items' => $created,
            ]);
        }

        return redirect()->back()->with(['success' => 'Dokument(e) erfolgreich hochgeladen']);
    }

    public function deleteExaminationDocument($id)
    {
        $doc = ExaminationImage::find($id);
        if ($doc) {
            $doc->delete();
            return redirect()->back()->with(['success' => 'Dokument gelöscht']);
        }
    }

    public function updateExaminationMeta(Request $request)
    {
        if (!Auth::check() || (Auth::user()->type ?? null) !== 'admin') {
            abort(403, 'Nur Admin darf diese Daten bearbeiten.');
        }
        $request->validate([
            'id' => 'required|integer|exists:orders,id',
            'document_type' => 'nullable|string|max:255',
            'examiner_name' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'service_book_details_en' => 'nullable|string',
            'paint_general_comment_en' => 'nullable|string',
            'lights_comment_en' => 'nullable|string',
        ]);

        $order = Order::find($request->id);
        $examination = OrderExamination::where('order_id', $order->id)->first();
        if (!$examination) {
            $examination = new OrderExamination();
            $examination->order_id = $order->id;
        }
        $examination->document_type = $request->document_type;
        $examination->examiner_name = $request->examiner_name;
        $examination->client_name = $request->client_name;
        $examination->save();

        $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id' => $examination->id]);
        if ($request->filled('service_book_details_en')) { $tr->service_book_details_en = $request->service_book_details_en; }
        if ($request->filled('paint_general_comment_en')) { $tr->paint_general_comment_en = $request->paint_general_comment_en; }
        if ($request->filled('lights_comment_en')) { $tr->lights_comment_en = $request->lights_comment_en; }
        $tr->examination_id = $examination->id; $tr->save();

        return redirect()->back()->with('success', 'PDF-Angaben aktualisiert');
    }

    public function updateExaminationAusstattung(Request $request)
    {
        if (!Auth::check() || (Auth::user()->type ?? null) !== 'admin') {
            abort(403, 'Nur Admin darf diese Daten bearbeiten.');
        }
        $request->validate([
            'id' => 'required|integer|exists:orders,id',
            'serienausstattung' => 'nullable|string',
            'sonderausstattung' => 'nullable|string',
            'serienausstattung_en' => 'nullable|string',
            'sonderausstattung_en' => 'nullable|string',
        ]);

        $order = Order::find($request->id);
        $examination = OrderExamination::where('order_id', $order->id)->first();
        if (!$examination) {
            $examination = new OrderExamination();
            $examination->order_id = $order->id;
        }
        $examination->serienausstattung = $request->serienausstattung;
        $examination->sonderausstattung = $request->sonderausstattung;
        $examination->save();
        $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id' => $examination->id]);
        if ($request->filled('serienausstattung_en')) { $tr->serienausstattung_en = $request->serienausstattung_en; }
        if ($request->filled('sonderausstattung_en')) { $tr->sonderausstattung_en = $request->sonderausstattung_en; }
        $tr->examination_id = $examination->id; $tr->save();

        return redirect()->back()->with('success', 'Ausstattung aktualisiert');
    }
    public function updateExaminationImage(Request $request)
    {
        $request->validate([
            'image_id' => 'required|integer|exists:examination_images,id',
            'image' => 'required|file|image',
        ]);

        $exImage = ExaminationImage::find($request->image_id);
        if (!$exImage) {
            return response()->json(['message' => 'Not found'], 404);
        }

        // Delete old file if exists
        if (!empty($exImage->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($exImage->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($exImage->image);
        }

        // Store new file with compression via Intervention
        $dirRel = 'examination-images';
        $fileRel = $dirRel . '/' . Str::uuid() . '.jpg';
        $dstAbs = storage_path('app/public/' . $fileRel);
        @mkdir(dirname($dstAbs), 0775, true);
        try {
            $this->processExaminationImageUpload($request->file('image'), $dstAbs);
        } catch (\Throwable $e) {
            Log::warning('Intervention image processing failed for examination image update.', [
                'image_id' => $exImage->id,
                'examination_id' => $exImage->examination_id,
                'original_name' => $request->file('image')->getClientOriginalName(),
                'target_path' => $fileRel,
                'error' => $e->getMessage(),
            ]);
            // Fallback
            $request->file('image')->storeAs('public', $fileRel);
        }
        $exImage->image = $fileRel;
        $exImage->save();

        return response()->json([
            'success' => true,
            'url' => \Illuminate\Support\Facades\Storage::url($exImage->image),
        ]);
    }
    public function storeExaminer(Request  $request)
    {
//        dd($request->all());
        $order=Order::find($request->id);
        $examination=OrderExamination::where('order_id',$order->id)->first();
        if(!$examination){
            $examination=new OrderExamination();
            $examination->save();
        }

        $examination->order_id=$request->id;

        // Lightweight "save & back" path: do not alter fields or completed steps
        if (($request->form ?? '') === 'save-back') {
            if (!$examination->id) { $examination->save(); }
            // Always return to the order overview
            return redirect(route('examiner.order', $order->id))->with('success','Daten gespeichert');
        }
        if ($request->form=='examination-condition'){
            $request->validate([
                'weather_conditions'=>'required',
                'lighting_conditions'=>'required',
                'vehicle_clean'=>'required',
                'vehicle_freely_accessible'=>'required',

            ]);
            $examination->weather_conditions=$request->weather_conditions;

            $examination->lighting_conditions=$request->lighting_conditions;
            $examination->vehicle_clean=$request->vehicle_clean;
            $examination->vehicle_freely_accessible=$request->vehicle_freely_accessible;
            $examination->vehicle_exam_condition_comment=$request->vehicle_exam_condition_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('vehicle_exam_condition_comment_en')) { $tr->vehicle_exam_condition_comment_en = $request->vehicle_exam_condition_comment_en; }
            $tr->examination_id = $examination->id; $tr->save();

        }
        if($request->form=='vehicle-data'){
            $examination->manufacturer=$request->manufacturer;
            $examination->model=$request->model;
            $examination->body_type=$request->body_type;
            $examination->transmission=$request->transmission;
            $examination->first_registration=$request->first_registration;
            $examination->fuel=$request->fuel;
            $examination->color=$request->color;
            $examination->engine_displacement=$request->engine_displacement;
            $examination->doors=$request->doors;
            $examination->power=$request->power;
            $examination->next_hu=$request->next_hu;
            $examination->km_reading=$request->km_reading;
            $examination->emission_class=$request->emission_class;
            $examination->previous_owners=$request->previous_owners;
            $examination->fin=$request->fin;
        }
        if($request->form=='vehicle-document'){
//            $request->validate([
//               'permits'=>'required',
//                'permits_details'=>'required',
//                'registration_certificate'=>'required',
////                'vehicle_title'=>'required',
//                'owner_manual'=>'required',
//                'hu_au_report'=>'required',
//                'service_book_type'=>'required',
//                'service_book_maintained'=>'required',
//                'vehicle_document_overall_comment'=>'required',
//            ]);
            $examination->permits=$request->permits;
            $examination->permits_details=$request->permits_details;
            $examination->registration_certificate=$request->registration_certificate;
            $examination->vehicle_title=$request->vehicle_title;
            $examination->owner_manual=$request->owner_manual;
            $examination->hu_au_report=$request->hu_au_report;
            $examination->service_book_type=$request->service_book_type;
            $examination->service_book_maintained=$request->service_book_maintained;
            $examination->service_book_details=$request->service_book_details;
            $examination->vehicle_document_overall_comment=$request->vehicle_document_overall_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('service_book_details_en')) { $tr->service_book_details_en = $request->service_book_details_en; }
            if ($request->filled('vehicle_document_overall_comment_en')) { $tr->vehicle_document_overall_comment_en = $request->vehicle_document_overall_comment_en; }
            $tr->examination_id = $examination->id; $tr->save();
        }

        if($request->form=='tires'){
//            $examination->vl_type=$request->vl_type;
//            $examination->tire_size_1=$request->tire_size_1;
//            $examination->tire_size_2=$request->tire_size_2;
//            $examination->tire_size_3=$request->tire_size_3;
//            $examination->tire_profile=$request->tire_profile;
//            $examination->tire_dot=$request->tire_dot;
//            $examination->vl_comments=$request->vl_comments;
//            $examination->vr_type=$request->vr_type;
//            $examination->vr_tire_size_1=$request->vr_tire_size_1;
//            $examination->vr_tire_size_2=$request->vr_tire_size_2;
//            $examination->vr_tire_size_3=$request->vr_tire_size_3;
//            $examination->vr_tire_profile=$request->vr_tire_profile;
//            $examination->vr_tire_dot=$request->vr_tire_dot;
//            $examination->vr_comments=$request->vr_comments;
            $examination->tires = $request->input('tires', []);
            // Save extra/kit selections
            $examination->tire_extra = $request->input('tire_extra');
            $examination->tire_extra_size = $request->input('tire_extra_size');
            $examination->tire_repair_expiry = $request->input('tire_repair_expiry');
            $examination->vehicle_tires_comment = $request->input('vehicle_tires_comment');
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('vehicle_tires_comment_en')) { $tr->vehicle_tires_comment_en = $request->input('vehicle_tires_comment_en'); }
            $tr->examination_id = $examination->id; $tr->save();
        }

        if($request->form=='body'){
//            dd($request->all());
            $examination->front_bumper=$request->front_bumper;
            $examination->front_bumper_damage=$request->front_bumper_damage;
            $examination->rear_bumper=$request->rear_bumper;
            $examination->rear_bumper_damage=$request->rear_bumper_damage;
            $examination->grill=$request->grill;
            $examination->grill_damage=$request->grill_damage;
            $examination->sill_left=$request->sill_left;
            $examination->sill_left_damage=$request->sill_left_damage;
            $examination->sill_right=$request->sill_right;
            $examination->sill_right_damage=$request->sill_right_damage;
            $examination->are_gap_ok=$request->are_gap_ok;
            $examination->body_general_comment=$request->body_general_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('body_general_comment_en')) { $tr->body_general_comment_en = $request->body_general_comment_en; }
            $tr->examination_id = $examination->id; $tr->save();

        }
        if ($request->form=='paint-thickness-condition'){

            $examination->bonnet_thickness_status=$request->bonnet_thickness_status;
            $examination->bonnet_paint_layer_thickness=$request->bonnet_paint_layer_thickness;
            $examination->bonnet_repainted=$request->bonnet_repainted;
            $examination->bonnet_any_damage=$request->bonnet_any_damage;
            $examination->bonnet_damages=$request->bonnet_damages;

            $examination->fender_vr_thickness_status=$request->fender_vr_thickness_status;
            $examination->fender_vr_paint_layer_thickness=$request->fender_vr_paint_layer_thickness;
            $examination->fender_vr_repainted=$request->fender_vr_repainted;
            $examination->fender_vr_any_damage=$request->fender_vr_any_damage;
            $examination->fender_vr_damages=$request->fender_vr_damages;



            $examination->fender_vl_thickness_status=$request->fender_vl_thickness_status;
            $examination->fender_vl_paint_layer_thickness=$request->fender_vl_paint_layer_thickness;
            $examination->fender_vl_repainted=$request->fender_vl_repainted;
            $examination->fender_vl_any_damage=$request->fender_vl_any_damage;
            $examination->fender_vl_damages=$request->fender_vl_damages;


            $examination->door_vl_thickness_status=$request->door_vl_thickness_status;
            $examination->door_vl_paint_layer_thickness=$request->door_vl_paint_layer_thickness;
            $examination->door_vl_repainted=$request->door_vl_repainted;
            $examination->door_vl_any_damage=$request->door_vl_any_damage;
            $examination->door_vl_damages=$request->door_vl_damages;


            $examination->door_hl_thickness_status=$request->door_hl_thickness_status;
            $examination->door_hl_paint_layer_thickness=$request->door_hl_paint_layer_thickness;
            $examination->door_hl_repainted=$request->door_hl_repainted;
            $examination->door_hl_any_damage=$request->door_hl_any_damage;
            $examination->door_hl_damages=$request->door_hl_damages;

            $examination->door_vr_thickness_status=$request->door_vr_thickness_status;
            $examination->door_vr_paint_layer_thickness=$request->door_vr_paint_layer_thickness;
            $examination->door_vr_repainted=$request->door_vr_repainted;
            $examination->door_vr_any_damage=$request->door_vr_any_damage;
            $examination->door_vr_damages=$request->door_vr_damages;

            $examination->door_hr_thickness_status=$request->door_hr_thickness_status;
            $examination->door_hr_paint_layer_thickness=$request->door_hr_paint_layer_thickness;
            $examination->door_hr_repainted=$request->door_hr_repainted;
            $examination->door_hr_any_damage=$request->door_hr_any_damage;
            $examination->door_hr_damages=$request->door_hr_damages;

            $examination->quarter_hl_thickness_status=$request->quarter_hl_thickness_status;
            $examination->quarter_hl_paint_layer_thickness=$request->quarter_hl_paint_layer_thickness;
            $examination->quarter_hl_repainted=$request->quarter_hl_repainted;
            $examination->quarter_hl_any_damage=$request->quarter_hl_any_damage;
            $examination->quarter_hl_damages=$request->quarter_hl_damages;


            $examination->quarter_hr_thickness_status=$request->quarter_hr_thickness_status;
            $examination->quarter_hr_paint_layer_thickness=$request->quarter_hr_paint_layer_thickness;
            $examination->quarter_hr_repainted=$request->quarter_hr_repainted;
            $examination->quarter_hr_any_damage=$request->quarter_hr_any_damage;
            $examination->quarter_hr_damages=$request->quarter_hr_damages;

            $examination->roof_thickness_status=$request->roof_thickness_status;
            $examination->roof_paint_layer_thickness=$request->roof_paint_layer_thickness;
            $examination->roof_repainted=$request->roof_repainted;
            $examination->roof_any_damage=$request->roof_any_damage;
            $examination->roof_damages=$request->roof_damages;

            $examination->tailgate_thickness_status=$request->tailgate_thickness_status;
            $examination->tailgate_paint_layer_thickness=$request->tailgate_paint_layer_thickness;
            $examination->tailgate_repainted=$request->tailgate_repainted;
            $examination->tailgate_any_damage=$request->tailgate_any_damage;
            $examination->tailgate_damages=$request->tailgate_damages;

            $examination->paint_general_comment=$request->paint_general_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('paint_general_comment_en')) { $tr->paint_general_comment_en = $request->paint_general_comment_en; }
            // collect EN 'other' texts for paint damages per part
            $partsPaint = ['bonnet','fender_vr','fender_vl','door_vl','door_hl','door_vr','door_hr','quarter_hl','quarter_hr','roof','tailgate'];
            $paintMap = is_array($tr->paint_damages_en ?? null) ? $tr->paint_damages_en : [];
            foreach ($partsPaint as $pk) {
                $enList = $request->input($pk . '_damages_en', null);
                if ($enList !== null) {
                    $paintMap[$pk] = array_values(array_filter((array)$enList, fn($x)=>trim((string)$x) !== ''));
                }
            }
            if (!empty($paintMap)) { $tr->paint_damages_en = $paintMap; }
            $tr->examination_id = $examination->id; $tr->save();


        }
        if($request->form=='vehicle-light'){
            $examination->headlights=$request->headlights;
            $examination->headlights_damages=$request->headlights_damages;
            $examination->headlights_damages_other=$request->headlights_damages_other;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            $tr->headlights_damages_other_en=$request->headlights_damages_other_en;

            $examination->rear_lights=$request->rear_lights;
            $examination->rear_lights_damages=$request->rear_lights_damages;
            $examination->rear_lights_damages_other=$request->rear_lights_damages_other;
            $tr->rear_lights_damages_other_en=$request->rear_lights_damages_other_en;

            $examination->brake_light=$request->brake_light;
            $examination->brake_light_damages=$request->brake_light_damages;
            $examination->brake_light_damages_other=$request->headlights_damages_other;
            $tr->brake_light_damages_other_en=$request->brake_light_damages_other_en;

            $examination->reverse_light=$request->reverse_light;
            $examination->reverse_light_damages=$request->reverse_light_damages;
            $examination->reverse_light_damages_other=$request->reverse_light_damages_other;
            $tr->reverse_light_damages_other_en=$request->reverse_light_damages_other_en;

            $examination->indicator=$request->indicator;
            $examination->indicator_damages=$request->indicator_damages;
            $examination->indicator_damages_other=$request->indicator_damages_other;
            $tr->indicator_damages_other_en=$request->indicator_damages_other_en;

            $examination->hazard_lights=$request->hazard_lights;
            $examination->hazard_lights_damages=$request->hazard_lights_damages;
            $examination->hazard_lights_damages_other=$request->hazard_lights_damages_other;
            $tr->hazard_lights_damages_other_en=$request->hazard_lights_damages_other_en;


            $examination->fog_lights=$request->fog_lights;
            $examination->fog_lights_damages=$request->fog_lights_damages;
            $examination->fog_lights_damages_other=$request->fog_lights_damages_other;
            $tr->fog_lights_damages_other_en=$request->fog_lights_damages_other_en;

            $examination->low_beam=$request->low_beam;
            $examination->low_beam_damages=$request->low_beam_damages;
            $examination->low_beam_damages_other=$request->low_beam_damages_other;
            $tr->low_beam_damages_other_en=$request->low_beam_damages_other_en;

            $examination->interior_light=$request->interior_light;
            $examination->interior_light_damages=$request->interior_light_damages;
            $examination->interior_light_damages_other=$request->interior_light_damages_other;
            $tr->interior_light_damages_other_en=$request->interior_light_damages_other_en;

            $examination->daytime_running_light=$request->daytime_running_light;
            $examination->daytime_running_light_damages=$request->daytime_running_light_damages;
            $examination->daytime_running_light_damages_other=$request->daytime_running_light_damages_other;
            $tr->daytime_running_light_damages_other_en=$request->daytime_running_light_damages_other_en;
            $tr->examination_id = $examination->id; $tr->save();
            $examination->lights_comment=$request->lights_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('lights_comment_en')) { $tr->lights_comment_en = $request->lights_comment_en; }
            $tr->examination_id = $examination->id; $tr->save();

        }
        if($request->form=='external-condition'){
            $examination->windshield = $request->windshield;
            $examination->windshield_details = $request->windshield_details;
            $examination->windshield_details_other = $request->windshield_details_other;

            $examination->window_glazing = $request->window_glazing;
            $examination->window_glazing_details = $request->window_glazing_details;
            $examination->window_glazing_details_other = $request->window_glazing_details_other;

            $examination->wipers = $request->wipers;
            $examination->wipers_details = $request->wipers_details;
            $examination->wipers_details_other = $request->wipers_details_other;

            $examination->seals = $request->seals;
            $examination->seals_details = $request->seals_details;
            $examination->seals_details_other = $request->seals_details_other;

            $examination->central_locking = $request->central_locking;
            $examination->central_locking_details = $request->central_locking_details;
            $examination->central_locking_details_other = $request->central_locking_details_other;

            $examination->attachments = $request->attachments;
            $examination->attachments_details = $request->attachments_details;
            $examination->attachments_details_other = $request->attachments_details_other;

            $examination->exterior_mirrors = $request->exterior_mirrors;
            $examination->exterior_mirrors_details = $request->exterior_mirrors_details;
            $examination->exterior_mirrors_details_other = $request->exterior_mirrors_details_other;

            $examination->rims = $request->rims;

            $examination->suspension = $request->suspension;
            $examination->suspension_details = $request->suspension_details;
            $examination->suspension_details_other = $request->suspension_details_other;

            $examination->shock_absorbers = $request->shock_absorbers;
            $examination->shock_absorbers_details = $request->shock_absorbers_details;
            $examination->shock_absorbers_details_other = $request->shock_absorbers_details_other;

            $examination->springs = $request->springs;
            $examination->springs_details = $request->springs_details;
            $examination->springs_details_other = $request->springs_details_other;

            $examination->brake_discs = $request->brake_discs;
            $examination->brake_discs_details = $request->brake_discs_details;
            $examination->brake_discs_details_other = $request->brake_discs_details_other;

            $examination->brake_pads = $request->brake_pads;
            $examination->brake_pads_details = $request->brake_pads_details;
            $examination->brake_pads_details_other = $request->brake_pads_details_other;

            $examination->exhaust_system = $request->exhaust_system;
            $examination->exhaust_system_details = $request->exhaust_system_details;
            $examination->exhaust_system_details_other = $request->exhaust_system_details_other;

            $examination->engine_oil_tightness = $request->engine_oil_tightness;
            $examination->engine_oil_tightness_details = $request->engine_oil_tightness_details;
            $examination->engine_oil_tightness_details_other = $request->engine_oil_tightness_details_other;

            $examination->gearbox_oil_tightness = $request->gearbox_oil_tightness;
            $examination->gearbox_oil_tightness_details = $request->gearbox_oil_tightness_details;
            $examination->gearbox_oil_tightness_details_other = $request->gearbox_oil_tightness_details_other;

            $examination->differential_oil_tightness = $request->differential_oil_tightness;
            $examination->differential_oil_tightness_details = $request->differential_oil_tightness_details;
            $examination->differential_oil_tightness_details_other = $request->differential_oil_tightness_details_other;

            $examination->underbody_condition = $request->underbody_condition;
            $examination->underbody_condition_details = $request->underbody_condition_details;
            $examination->underbody_condition_details_other = $request->underbody_condition_details_other;

            $examination->other_findings = $request->other_findings;
            $examination->other_findings_details = $request->other_findings_details;
            $examination->other_findings_details_other = $request->other_findings_details_other;

            $examination->external_overall_comment = $request->external_overall_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('external_overall_comment_en')) { $tr->external_overall_comment_en = $request->external_overall_comment_en; }
            $tr->examination_id = $examination->id; $tr->save();

            // EN versions for "Sonstiges" text inputs (admin-only UI)
            foreach (['windshield','window_glazing','wipers','seals','central_locking','attachments','exterior_mirrors','suspension','shock_absorbers','springs','brake_discs','brake_pads','exhaust_system','engine_oil_tightness','gearbox_oil_tightness','differential_oil_tightness','underbody_condition','other_findings'] as $kk){
                $key = $kk . '_details_other_en';
                if ($request->has($key)) {
                    $tr->{$key} = $request->input($key, []);
                }
            }
            $tr->examination_id = $examination->id; $tr->save();

        }
        if ($request->form=='technology'){
//            dd($request->all());
          $examination->engine_oil_comment=$request->engine_oil_comment;
          $examination->engine_oil=$request->engine_oil;

            $examination->general_engine_component_comment=$request->general_engine_component_comment;
            $examination->general_engine_component=$request->general_engine_component;
            $examination->coolant_comment=$request->coolant_comment;
            $examination->break_fluid=$request->break_fluid;
            $examination->coolant=$request->coolant;
            $examination->next_inspection=$request->next_inspection;
            $examination->next_inspection_comment=$request->next_inspection_comment;
            $examination->next_oil_change=$request->next_oil_change;
            $examination->next_oil_change_comment=$request->next_oil_change_comment;
            $examination->break_fluid_comment=$request->break_fluid_comment;
            $examination->technology_overall_comment=$request->technology_overall_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('technology_overall_comment_en')) { $tr->technology_overall_comment_en = $request->technology_overall_comment_en; }
            if ($request->filled('next_inspection_en')) { $tr->next_inspection_en = $request->next_inspection_en; }
            if ($request->filled('next_oil_change_en')) { $tr->next_oil_change_en = $request->next_oil_change_en; }
            $tr->examination_id = $examination->id; $tr->save();
            $tr->examination_id = $examination->id; $tr->save();

        }
        if($request->form=='test-drive'){
            $examination->test_drive_done = $request->test_drive_done;
            $examination->test_run_done = $request->test_run_done;
            $examination->test_drive_overall_comment = $request->test_drive_overall_comment;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('test_drive_overall_comment_en')) { $tr->test_drive_overall_comment_en = $request->test_drive_overall_comment_en; }
            $tr->examination_id = $examination->id; $tr->save();

// --- Test Drive ---
            $examination->td_engine_run = $request->td_engine_run;
            $examination->td_engine_run_note = $request->td_engine_run_note;
            if ($request->filled('td_engine_run_note_en')) { $tr->td_engine_run_note_en = $request->td_engine_run_note_en; }

            $examination->td_steering = $request->td_steering;
            $examination->td_steering_note = $request->td_steering_note;
            if ($request->filled('td_steering_note_en')) { $tr->td_steering_note_en = $request->td_steering_note_en; }

            $examination->td_clutch = $request->td_clutch;
            $examination->td_clutch_note = $request->td_clutch_note;
            if ($request->filled('td_clutch_note_en')) { $tr->td_clutch_note_en = $request->td_clutch_note_en; }

            $examination->td_transmission = $request->td_transmission;
            $examination->td_transmission_note = $request->td_transmission_note;
            if ($request->filled('td_transmission_note_en')) { $tr->td_transmission_note_en = $request->td_transmission_note_en; }

            $examination->td_speedometer = $request->td_speedometer;
            $examination->td_speedometer_note = $request->td_speedometer_note;
            if ($request->filled('td_speedometer_note_en')) { $tr->td_speedometer_note_en = $request->td_speedometer_note_en; }

            $examination->td_brake_feel = $request->td_brake_feel;
            $examination->td_brake_feel_note = $request->td_brake_feel_note;
            if ($request->filled('td_brake_feel_note_en')) { $tr->td_brake_feel_note_en = $request->td_brake_feel_note_en; }

            $examination->td_strange_noises = $request->td_strange_noises;
            $examination->td_strange_noises_note = $request->td_strange_noises_note;
            if ($request->filled('td_strange_noises_note_en')) { $tr->td_strange_noises_note_en = $request->td_strange_noises_note_en; }

            $examination->td_starter = $request->td_starter;
            $examination->td_starter_note = $request->td_starter_note;
            if ($request->filled('td_starter_note_en')) { $tr->td_starter_note_en = $request->td_starter_note_en; }

            $examination->td_timing = $request->td_timing;
            $examination->td_timing_note = $request->td_timing_note;
            if ($request->filled('td_timing_note_en')) { $tr->td_timing_note_en = $request->td_timing_note_en; }

// --- Test Run ---
            $examination->tr_starter = $request->tr_starter;
            $examination->tr_starter_note = $request->tr_starter_note;
            if ($request->filled('tr_starter_note_en')) { $tr->tr_starter_note_en = $request->tr_starter_note_en; }

            $examination->tr_clutch = $request->tr_clutch;
            $examination->tr_clutch_note = $request->tr_clutch_note;
            if ($request->filled('tr_clutch_note_en')) { $tr->tr_clutch_note_en = $request->tr_clutch_note_en; }

            $examination->tr_engine_run = $request->tr_engine_run;
            $examination->tr_engine_run_note = $request->tr_engine_run_note;
            if ($request->filled('tr_engine_run_note_en')) { $tr->tr_engine_run_note_en = $request->tr_engine_run_note_en; }

            $examination->tr_strange_noises = $request->tr_strange_noises;
            $examination->tr_strange_noises_note = $request->tr_strange_noises_note;
            if ($request->filled('tr_strange_noises_note_en')) { $tr->tr_strange_noises_note_en = $request->tr_strange_noises_note_en; }

            $examination->tr_timing = $request->tr_timing;
            $examination->tr_timing_note = $request->tr_timing_note;
            if ($request->filled('tr_timing_note_en')) { $tr->tr_timing_note_en = $request->tr_timing_note_en; }
            $tr->examination_id = $examination->id; $tr->save();
        }
        if($request->form=='interior'){
//            dd($request->all());

            foreach (OrderExamination::$fields as $field) {
                $examination->$field = $request->input($field);

                $examination->{$field . '_detail'} = $request->input($field . '_detail', []);
                $examination->{$field . '_detail_other'} = $request->input($field . '_detail_other', []);
                if ($request->has($field . '_detail_other_en')) {
                    $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
                    $tr->{$field . '_detail_other_en'} = $request->input($field . '_detail_other_en', []);
                    $tr->examination_id = $examination->id; $tr->save();
                }
            }

            // Smell
            $examination->smell = $request->input('smell');
            $examination->smell_detail_other = $request->input('smell_detail_other');
            if ($request->filled('smell_detail_other_en')) {
                $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
                $tr->smell_detail_other_en = $request->input('smell_detail_other_en');
                $tr->examination_id = $examination->id; $tr->save();
            }

            // Overall comment
            $examination->interior_overall_comment = $request->input('interior_overall_comment');
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('interior_overall_comment_en')) { $tr->interior_overall_comment_en = $request->input('interior_overall_comment_en'); }
            $tr->examination_id = $examination->id; $tr->save();

        }
        if ($request->form=='other-conclusion'){
            $examination->error_in_instrument_cluster = $request->error_in_instrument_cluster;
            $examination->error_in_instrument_cluster_note = $request->error_in_instrument_cluster_note;
            if ($request->filled('error_in_instrument_cluster_note_en')) {
                $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
                $tr->error_in_instrument_cluster_note_en = $request->error_in_instrument_cluster_note_en;
                $tr->examination_id = $examination->id; $tr->save();
            }
            $examination->error_in_instrument_cluster_comments = $request->error_in_instrument_cluster_comments;

            $examination->error_in_error_memory = $request->error_in_error_memory;
            $examination->error_in_error_memory_note = $request->error_in_error_memory_note;
            if ($request->filled('error_in_error_memory_note_en')) {
                $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
                $tr->error_in_error_memory_note_en = $request->error_in_error_memory_note_en;
                $tr->examination_id = $examination->id; $tr->save();
            }
            $examination->error_in_error_memory_comments = $request->error_in_error_memory_comments;

            $examination->known_accident_damage_status = $request->known_accident_damage_status;
            $examination->known_accident_damage_note = $request->known_accident_damage_note;
            if ($request->filled('known_accident_damage_note_en')) {
                $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
                $tr->known_accident_damage_note_en = $request->known_accident_damage_note_en;
                $tr->examination_id = $examination->id; $tr->save();
            }
            $examination->known_accident_damage_comments = $request->known_accident_damage_comments;

            $examination->conclusion = $request->conclusion;
            $tr = $examination->translation ?: new \App\Models\OrderExaminationTranslation(['examination_id'=>$examination->id]);
            if ($request->filled('conclusion_en')) { $tr->conclusion_en = $request->conclusion_en; }
            $tr->examination_id = $examination->id; $tr->save();
        }

        // Add step to completed list (skip for non-steps)
        $completedSteps = $examination->completed_steps ?? [];
        if (($request->form ?? '') !== 'save-back') {
            if (!in_array($request->form, $completedSteps)) {
                $completedSteps[] = $request->form;
                $examination->completed_steps = $completedSteps;
            }
        }

        $examination->save();

        if($request->next_url){
//            dd($request->next_url);
            return redirect($request->next_url)->with('success','Fortschritt gespeichert.');
        }

        return redirect(route('examiner.order',$order->id))->with('success','Fortschritt gespeichert.');
//        if($request->){
//
//        }
    }
    public function promoCheck(Request $request)
    {
        $user=User::where('type','partner')->where('promo_code',$request->promo_code)
            ->whereNotNull('promo_code')->first();
        if ($user){
            return response([
               'success'=>true,
               'message'=>'Congrats!, You got 10% off'
            ]);
        }
        return response([
           'success'=>false,
           'message'=>'Invalid discount code'
        ]);

    }
    public function partnerPassword($id)
    {
        $user=User::find($id);
        if ($user->type=='partner'){
            return view('frontpages.partner-password',compact('user'));
        }

        abort(404);


    }
    public function partnerPasswordUpdate(Request $request)
    {
      $request->validate(['password'=>'required|confirmed']);
        $user=User::find($request->id);
        if ($user->type=='partner'){
            $user->password=bcrypt($request->password);
            $user->update();
            Auth::login($user);

            return redirect(route('user.dashboard'))->with('success','Password updated successfully, You can login now');
        }
        return redirect()->back();
    }
    public function preise()
    {
        return view('frontpages.preise');

    }
    public function bookingS4()
    {
        return view('frontpages.booking-s4');
    }
    public function inhalt()
    {
        return view('frontpages.inhalt');
    }
    public function reviewPage()
    {

        return view('frontpages.review');
    }
    public function review(Request $request){
        $user=User::find($request->id);
        if ($user){

        }else{
            abort(404);
        }
        return view('frontpages.review',compact('user'));
    }
    public function support(){
        return view('frontpages.support');
    }

    public function rezensionen(){
        return view('frontpages.rezensionen');
    }

    public function kaufabwicklung(){
        return view('frontpages.kaufabwicklung');
    }

    public function berlin(){
        return view('frontpages.berlin');
    }

    public function koeln(){
        return view('frontpages.koeln');
    }

    public function frankfurt(){
        return view('frontpages.frankfurt');
    }

    public function leipzig(){
        return view('frontpages.leipzig');
    }

    public function dortmund(){
        return view('frontpages.dortmund');
    }

    public function stuttgart(){
        return view('frontpages.stuttgart');
    }

    public function bremen(){
        return view('frontpages.bremen');
    }


    public function verhandlungdownload(){
        return view('frontpages.verhandlungdownload');
    }

    public function duesseldorf(){
        return view('frontpages.duesseldorf');
    }

    public function hamburg(){
        return view('frontpages.hamburg');
    }

    public function deutschlandweit(){
        return view('frontpages.deutschlandweit');
    }

    public function partner(){
        return view('frontpages.partner');
    }

    public function hannover(){
        return view('frontpages.hannover');
    }

    public function angebot(){
        return view('frontpages.angebot');
    }

    public function vorkaufcheck(){
        return view('frontpages.vorkaufcheck');
    }

    public function muenchen(){
        return view('frontpages.muenchen');
    }

    public function dresden(){
        return view('frontpages.dresden');
    }

    public function stadtplz(){
        return view('frontpages.stadtplz');
    }
    public function postStadtplz(Request $request)
    {

        $request->validate(['email'=>'required']);
        Mail::to('kontakt@carspector.de')->send(new StadPlzMail($request));


        return redirect()->back()->with('success','We have received your request, We will contact you shortly...');

    }

    public function fahrzeuglieferung(){
        return view('frontpages.fahrzeuglieferung');
    }

    public function postFahrzeuglieferung(Request $request)
    {

        $request->validate(['email'=>'required']);
        Mail::to('kontakt@carspector.de')->send(new StadPlzMail($request));


        return redirect()->back()->with('success','Danke! Wir melden uns in Kürze.');

    }

    public function gebrauchtwagencheck(){
        return view('frontpages.gebrauchtwagencheck');
    }
    public function kaufbegleitung(){
        return view('frontpages.vorteile.kaufbegleitung');
    }
    public function oldtimer(){
        return view('frontpages.vorteile.oldtimer');
    }
    public function transporter(){
        return view('frontpages.vorteile.transporter');
    }
    public function sportwagen(){
        return view('frontpages.vorteile.sportwagen');
    }
    public function wohnmobil(){
        return view('frontpages.vorteile.wohnmobil');
    }
    public function inseratcheck(){
        return view('frontpages.vorteile.inseratcheck');
    }
    public function inseratwertgutachten(){
        return view('frontpages.vorteile.inseratwertgutachten');
    }
    public function preisermittlung(){
        return view('frontpages.vorteile.preisermittlung');
    }

    public function wertermittlung(){
        return view('frontpages.vorteile.wertermittlung');
    }

    public function registerExaminer(){
        return view('auth.examiner-register');
    }
    public function orderCs($id)
    {
        $order=Order::find($id);

        if (!auth()->check() || !in_array(auth()->user()->type ?? null, ['admin', 'staff'])) {
            if ($order->examiner_id != auth()->user()->id) {
                return redirect('/')->with('success', 'You are not authorized to access this page');
            }
        }
        $examination=OrderExamination::where('order_id',$id)->first();

        if (!$examination){
            $examination=new OrderExamination();
        }else{
            if (!auth()->check() || !in_array(auth()->user()->type ?? null, ['admin', 'staff'])) {
                if (in_array($examination->status, ['finishing','finished','inspecting'])) {
                    Auth::logout();
                    return redirect('/')->with('success', 'Examination is completed, you can not edit it');
                }
            }
        }
//        dd($examination);
        if (\auth()->user()->type=='user' || \auth()->user()->type=='examiner') {
            if ($examination->status == 'finishing' || $examination->status == 'finished' || $examination->status == 'inspecting' || $examination->status == 'completed') {
                Auth::logout();
                return redirect('/')->with('success', 'Examination is completed, you can not edit it');
            }
        }
        return view('frontpages.vehicle.ordercs',compact('id','examination'));
    }

    public function costCalculations($id)
    {
        $order = Order::findOrFail($id);

        // Authorization: allow admin or assigned examiner
        if (auth()->check()) {
            $user = auth()->user();
            if (($user->type ?? null) !== 'admin') {
                if ((int)$order->examiner_id !== (int)$user->id) {
                    return redirect('/')->with('success', 'You are not authorized to access this page');
                }
            }
        } else {
            return redirect()->route('examiner.login');
        }

        $examination = OrderExamination::where('order_id', $order->id)->first();
        if (!$examination) {
            $examination = new OrderExamination(['order_id' => $order->id]);
        }

        return view('frontpages.vehicle.cost-calculations', [
            'id' => $order->id,
            'order' => $order,
            'examination' => $examination,
        ]);
    }

    public function completeExamination(Request $request)
    {
        $order=Order::find($request->id);
        if ($order){
            $examination=OrderExamination::where('order_id',$order->id)->first();

            if ($examination){
                $examination->status='finishing';

                $examination->update();

                $order->status='inspecting';
                $order->update();

                try {
                    Mail::to($order->user->email)->send(new ExaminationStatusMail($order,$examination,$order->user));
                } catch (\Exception $e) {
                    Log::debug($e->getMessage());
                }


                if(\auth()->user()->type!='admin') {

                    Auth::logout();
                }

                return redirect(route('examiner-thanks'))->with('success','Vielen Dank! CarCheck erfolgreich abgeschlossen.');
            }

        }

    }
    public function examCondition($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.exam-condition',compact('id','examination'));
    }

    public function vehicleData($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.vehicles-data',compact('id','examination'));
    }

    public function vehicleDocs($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.vehicles-docs',compact('id','examination'));
    }

    public function tries($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.tries',compact('id','examination'));
    }

    public function triesBody($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.tries-body',compact('id','examination'));
    }

    public function vehicleLight($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.vehiclelighting',compact('id','examination'));
    }

    public function externalCondition($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.external-condition',compact('id','examination'));
    }

    public function technology($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.vehicletechnology',compact('id','examination'));
    }

    public function testDrive($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.test-drive',compact('id','examination'));;
    }

    public function interior($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }

        return view('frontpages.vehicle.interior',compact('id','examination'));
    }

    public function otherConclusion($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }
        return view('frontpages.vehicle.other-conclusion',compact('id','examination'));
    }

    public function vehiclePhoto($id)
    {
        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
            $examination->order_id = $id;
            $examination->save();
        }
        $all = ExaminationImage::where('examination_id', $examination->id)
            ->orderByRaw('COALESCE(sort_order, 1000000000) ASC')
            ->orderBy('id','DESC')
            ->get();
        $isImage = function($path) {
            $ext = strtolower(pathinfo((string)$path, PATHINFO_EXTENSION));
            return in_array($ext, ['jpg','jpeg','png','gif','webp']);
        };
        $images = $all->filter(function($item) use ($isImage){
            return $isImage($item->image ?? '');
        });
        $documents = $all->filter(function($item) use ($isImage){
            return !$isImage($item->image ?? '');
        });

        return view('frontpages.vehicle.vehiclephoto',compact('id','examination','images','documents'));
    }

    public function sortExaminationImages(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:examination_images,id',
            'examination_id' => 'required|integer|exists:order_examinations,id',
        ]);
        $ids = $request->input('ids');
        $examId = (int)$request->input('examination_id');
        $order = 1;
        foreach ($ids as $id) {
            ExaminationImage::where('id', $id)->where('examination_id', $examId)->update(['sort_order' => $order++]);
        }
        return response()->json(['success' => true]);
    }

    public function sortExaminationDocuments(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:examination_images,id',
            'examination_id' => 'required|integer|exists:order_examinations,id',
        ]);
        $ids = $request->input('ids');
        $examId = (int)$request->input('examination_id');
        $order = 1;
        foreach ($ids as $id) {
            ExaminationImage::where('id', $id)->where('examination_id', $examId)->update(['sort_order' => $order++]);
        }
        return response()->json(['success' => true]);
    }

    public function downloadExaminationImagesZip($orderId)
    {
        // Admin or staff only
        if (!Auth::check() || !in_array(Auth::user()->type ?? null, ['admin', 'staff'])) {
            abort(403, 'Nur für Admin/Staff.');
        }

        $examination = OrderExamination::where('order_id', $orderId)->first();
        if (!$examination) {
            abort(404, 'Keine Bilder gefunden');
        }
        // Only images, in the same order as displayed
        $images = ExaminationImage::where('examination_id', $examination->id)
            ->get()
            ->filter(function($item){
                $ext = strtolower(pathinfo((string)$item->image, PATHINFO_EXTENSION));
                return in_array($ext, ['jpg','jpeg','png','gif','webp']);
            })
            ->sortBy(function($item){
                return [($item->sort_order ?? 1000000000), -$item->id];
            })
            ->values();

        if ($images->isEmpty()) {
            abort(404, 'Keine Bilder vorhanden');
        }

        $zip = new \ZipArchive();
        $tmpDir = storage_path('app/tmp');
        @mkdir($tmpDir, 0775, true);
        $zipPath = $tmpDir . '/examination-' . $orderId . '-images.zip';
        if (file_exists($zipPath)) @unlink($zipPath);
        if ($zip->open($zipPath, \ZipArchive::CREATE) !== true) {
            abort(500, 'ZIP konnte nicht erstellt werden');
        }

        $idx = 1;
        foreach ($images as $img) {
            $rel = $img->image;
            $abs = storage_path('app/public/' . ltrim($rel, '/'));
            if (!file_exists($abs)) continue;
            $ext = strtolower(pathinfo($abs, PATHINFO_EXTENSION));
            $name = str_pad((string)$idx, 3, '0', STR_PAD_LEFT) . '.' . ($ext ?: 'jpg');
            $zip->addFile($abs, $name);
            $idx++;
        }
        $zip->close();

        if (!file_exists($zipPath)) {
            abort(500, 'ZIP nicht gefunden');
        }
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    public function listExaminationImages($orderId)
    {
        $examination = OrderExamination::where('order_id', $orderId)->first();
        if (!$examination) return response()->json(['items' => []]);
        $all = ExaminationImage::where('examination_id', $examination->id)
            ->orderByRaw('COALESCE(sort_order, 1000000000) ASC')
            ->orderBy('id','DESC')
            ->get();
        $isImage = function($path) {
            $ext = strtolower(pathinfo((string)$path, PATHINFO_EXTENSION));
            return in_array($ext, ['jpg','jpeg','png','gif','webp']);
        };
        $images = $all->filter(function($item) use ($isImage){ return $isImage($item->image ?? ''); });
        $items = $images->map(function($img){
            return [
                'id' => $img->id,
                'image1' => $img->image1,
            ];
        })->values();
        return response()->json(['items' => $items]);
    }

    public function paintThicknessCondition($id)
    {

        $examination=OrderExamination::where('order_id',$id)->first();
        if(!$examination){
            $examination=new OrderExamination();
        }

//        bonnet_paint_layer_thickness
        return view('frontpages.vehicle.paint-thickness-condition',compact('id','examination'));;
    }

    public function pdf($id)
    {
        return view('frontpages.pdf.index',compact('id'));
    }
    public function impressum(){
        return view('frontpages.impressum');
    }
    public function agb(){
        return view('frontpages.agb');
    }
    public function datenschutz(){
        return view('frontpages.datenschutz');
    }
    public function widerruf(){
        return view('frontpages.widerruf');
    }
    public function faq(){
        return view('frontpages.faq');
    }
    public function kontakt(){
        return view('frontpages.kontakt');
    }
    public function examinerProfile($id){
        $user=User::find($id);
        return view('partials.profile-modal',compact('user'));
    } public function examinerProfile1($id){
        $user=User::find($id);
        return view('partials.profile-modal1',compact('user'));
    }
    public function checkExaminer(Request $request){
//        dd($request->all());
        $settings=Setting::first();
        if(!$settings){
            $settings=new Setting();
        }
        $examiners=User::when($request->city!='',function($q){
            $q->whereHas('cities',function($q1){
//             return $q1->where('name','like','%'.\request()->city.'%');
                return $q1->where('name','=',strtolower(\request()->city));
            });
        })->where('verify_status','verified')->where('available',1)->
            when($settings->fake_examiners==0,function ($q){
                $q->where('is_fake',0)->orderBy('is_fake','asc');
            })
            ->get();

        $stripe = new \Stripe\StripeClient(stripe_secrete());
        $price=$stripe->prices->retrieve(stripe_price(), []);
        $amount=$price->unit_amount/100;

//        dd($examiners);
        return view('frontpages.examiner-check',compact('examiners','amount'));
    }
    public function checkExaminer1(Request $request){
//        dd($request->all());
        $settings=Setting::first();
        if(!$settings){
            $settings=new Setting();
        }
        $examiners=User::when($request->city!='',function($q){
            $q->whereHas('cities',function($q1){
//             return $q1->where('name','like','%'.\request()->city.'%');
                return $q1->where('name','=',strtolower(\request()->city));
            });
        })->where('verify_status','verified')->where('available',1)->
        when($settings->fake_examiners==0,function ($q){
            $q->where('is_fake',0)->orderBy('is_fake','asc');
        })
            ->get();

        $stripe = new \Stripe\StripeClient(stripe_secrete());
        $price=$stripe->prices->retrieve(stripe_price(), []);
        $amount=$price->unit_amount/100;


//        dd($examiners);
        return view('frontpages.booking.examiner-check1',compact('examiners','amount'));
    }
    public function allExaminer(Request $request){
        $settings=Setting::first();
        if(!$settings){
            $settings=new Setting();
        }
        $examiners=User::query();
        $examiners=$examiners->select('users.*',
            DB::raw('(select avg(rating_with_examiner) from reviews where users.id=reviews.examiner_id) as avg_rating'),
            DB::raw('(select count(*) from orders where orders.examiner_id=users.id) as completed_orders')
        )
        ->groupBy('users.id')
        ->where('verify_status','verified')->where('users.available','=',1);
        $examiners=$examiners
//            ->when($request->minprice!='' && $request->maxprice!='',function($q){
//           return $q->whereBetween('price',[\request()->minprice,\request()->maxprice]);
//        })
            ->when($request->minprice!='',function($q){
            return $q->where('price','>=',request()->minprice);
        })->when($request->maxprice!='',function($q){
            return $q->where('price','<=',request()->maxprice);
        });
        $examiners=$examiners->when(\request('mostly_booked')=='yes',function($q){
           return $q->orderBy('completed_orders','DESC')->orderBy('avg_rating','desc');
        });

        $examiners=$examiners->when($request->city!='',function($q){
           $q->whereHas('cities',function($q1){
//             return $q1->where('name','like','%'.\request()->city.'%');
             return $q1->where('name','=',strtolower(\request()->city));
           });
        });
        $examiners=$examiners->when($request->rating!='',function($q){
            $minRating=\request('rating');
            $maxRating=\request('rating')+1;
            return $q->having('avg_rating','>=',$minRating)->orHaving('avg_rating','<',$maxRating);
        });

        $examiners=$examiners->when($request->completed_orders!='',function($q){

//            return $q->having('completed_orders','=',\request('completed_orders'));
        });
//        $examiners=$examiners->when($request->date!='',function ($q){
//
//            return $q->where('examiner_availabilities.date',date('Y-m-d',strtotime(\request('date'))));
//        });
//        $examiners=$examiners->when($request->availability=='true',function ($q){
//
//            return $q->where('examiner_availabilities.date','>=',date('Y-m-d'))->where('is_fake','<>',1);
//        });
//        $examiners=$examiners->when($request->time!='' && $request->time!='Zeit auswählen (optional)',function ($q){
//
//            $q->join('availibilty_times','examiner_availabilities.id','=','availibilty_times.availability_id')
//                ->where('availibilty_times.time',date('H:i:s',strtotime(\request('time'))));
//        });



//        $examiners=$examiners->when($settings->fake_examiners,function ($q){
//           $q->where('is_fake',1);
//        });
        $examiners=$examiners->when($settings->fake_examiners==0,function ($q){
            $q->where('is_fake',0)->orderBy('is_fake','asc');
        });


        $examiners->when($request->sortby!='',function($q){
//            if (\request('sortby')=='name'){
//                return $q->orderBy('name','asc');
//            }
//            if (\request('sortby')=='dob'){
//                return $q->orderBy('dob','asc');
//            }

            if (\request('sortby')=='mostly_booked'){
                return $q->orderBy('completed_orders','desc');
            }
            if (\request('sortby')=='price_up'){
                return $q->orderBy('price','desc');
            }
            if (\request('sortby')=='price_down'){
                return $q->orderBy('price','asc');
            }

            if (\request('sortby')=='best_rating'){
                return $q->orderBy('avg_rating','desc');
            }

        });
        if ($settings->fake_examiners==1){
            $examiners=$examiners->inRandomOrder();
        }
        //Rating & Completed Orders Remaining only.

        if ($request->ajax()){

            $examiners=$examiners->where('type','examiner')->paginate(100);
            return response([
                'html'=>view('partials.examiners',compact('examiners'))->render(),
                'total'=>$examiners->total()
            ]);
        }
        $examiners=$examiners->where('type','examiner')->paginate(12);
        return view('frontpages.all-examiner',compact('examiners'));
    }
    public function vorteile(){
        return view('frontpages.vorteile');
    }
    public function vorteile1(){
        return view('frontpages.vorteile.vorteile1');
    }
    public function vorteile2(){
        return view('frontpages.vorteile.vorteile2');
    }
    public function vorteile3(){
        return view('frontpages.vorteile.vorteile3');
    }
    public function vorteile4(){
        return view('frontpages.vorteile.vorteile4');
    }
    public function vorteile5(){
        return view('frontpages.vorteile.vorteile5');
    }
    public function vorteile6(){
        return view('frontpages.vorteile.vorteile6');
    }

    public function inseratvergleich(){
        return view('frontpages.vorteile.inseratvergleich');
    }







    public function vortileSuccess(Request $request)
    {
        $vortile=Session::get('vortile');
        Mail::to('kontakt@carspector.de')->send(new VortileMail($vortile));
        return redirect(route('vortile.success.payment'));
    }
    public function storeVortile(Request $request)
    {
//        dd($this->all());
//        $request->validate(['email'=>'required']);


//        Mail::to('kontakt@carspector.de')->send(new StadPlzMail($request));
//        dd($request->all());
        Session::put('vortile',$request->all());
        \Stripe\Stripe::setApiKey(stripe_secrete());
        $product = \Stripe\Product::create([
            'name' => 'Inserat-Vergleich',
            "description" => "Wir vergleichen deine gewünschten Inserate und erstellen innerhalb von 24 Stunden eine detaillierte Rangliste.",
        ]);
        $price = \Stripe\Price::create([
            'product' => $product,
            'unit_amount' => $request->amount * 100,
            'currency' => 'EUR',
        ]);
        $YOUR_DOMAIN = url('');
        $successUrl=route('votile.success');


        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                // TODO: replace this with the `price` of the product you want to sell
                'price' => $price,
                'quantity' => 1,
            ]],
            'payment_method_types' => [
                'card','paypal'
            ],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => $YOUR_DOMAIN . '/cancel',
        ]);
//            return response(['url' => $checkout_session->url, $checkout_session]);


        return redirect($checkout_session->url);
    }

    public function newBooking(){
        return view('frontpages.new-booking');
    }
    public function sendNewBooking(Request $request)
    {
        $this->validate($request,['email'=>'required|email','name'=>'required',
            'phone'=>'required','desc'=>'required',
            'g-recaptcha-response' => 'required',
        ]);
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = '6LfYSIAqAAAAALZIvG3eV-N05iKUi4hQOYfTafIk';

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
        ]);

        $recaptchaData = $response->json();

        if (!$recaptchaData['success']) {
            return back()->withErrors(['g-recaptcha-response' => 'Bitte bestätigen Sie, dass Sie kein Roboter sind.'])->withInput();
        }
        $request->validate(['email'=>'required|email','name'=>'required','phone'=>'required','desc'=>'required']);
        Mail::to('kontakt@carspector.de')->send(new NewBookingMail($request->all()));
        return redirect()->back()->with('success','Danke für deine Nachricht! Wir melden uns in Kürze.');
    }
    public function orderDetail($id){
        $order=Order::find($id);
//        if ($order->user_id==Auth::user()->id || $order->examiner_id==Auth::user()->id){
//            return view('partials.order',compact('order'));
//        }
//        dd($order);
        return view('partials.order',compact('order'));
    }
    public function orderDetail1($id){
        $order=Order::find($id);
        if ($order->user_id==Auth::user()->id || $order->examiner_id==Auth::user()->id){
            return view('partials.order1',compact('order'));
        }
        return view('partials.order1',compact('order'));
    }
    public function saveReview(Request $request){
//        dd($request->all());

    $review=new Review();
    $review->examiner_id=$request->examiner_id;
    if (Auth::user()) {
        $review->user_id = Auth::user()->id;
        $checkReview=Review::where('user_id',Auth::user()->id)
            ->where('examiner_id',$request->examiner_id)->get()->last();
        if ($checkReview){
            return response(['success'=>false,'message'=>'You already reviewed this examiner.']);
        }
    }
    $review->name=$request->name;
    $review->rating_with_examiner=$request->rating_with_examiner;
    $review->rating_about_examiner=$request->rating_about_examiner;
    $review->save();
    return response([
        'success'=>true,
        'message'=>'Thank you for your review, has been saved successfully...'
    ]);
    }

    public function adminLogin(){
        return view('auth.admin-login');
    }

    public function clearBalance(){
        $sevenDaysAgo = now()->subDays(7)->toDateString();
        $orders=Order::where('cleared',0)->whereDate('created_at','<=',$sevenDaysAgo)->get();
        Log::debug(json_encode($orders));
        foreach ($orders as $order) {
            $examiner = User::find($order->examiner_id);
            $examiner->balance = $examiner->balance + ($order->price-$order->commission);
            $examiner->update();
            $updateOrder=Order::find($order->id);

            $updateOrder->cleared_at=Carbon::now()->toDateTimeString();
            $updateOrder->cleared=1;
            $updateOrder->update();
        }
        return response(['success'=>true],200);
    }

    public function fakeExaminers(){

        $filename = public_path('examiners.csv');
        $file = fopen($filename, "r");
        $all_data = array();

        $citiyfile = public_path('cities.csv');
        $cityFile = fopen($citiyfile, "r");
        $all_cities = array();

        $cities=City::query()->delete();
        $j=0;
        while ( ($all_cities = fgetcsv($cityFile, 200, ",",'"')) !==FALSE ) {

            dump($all_cities);
            if ($j > 0) {
//                dump($all_cities);
                $city=new City();
                $city->name = $all_cities[0];
                $city->zip_code = mt_rand(100000,999999);
                $city->save();
            }
            $j++;
        }
        dd('ok');

        $i=0;
        $faker=Factory::create();
        while ( ($line = fgets($file)) !== false) {

            if ($i > 2){
                $data=str_getcsv($line, ",", '"');

                $name=explode($data[1],' ');
                $imageContent = file_get_contents($data[2]);
                $image = 'pictures/'.$data[1].$data[0].'-profile'.'.png';
                $cities=City::all()->random(5)->pluck('id');


                $examiner = new User();
                $examiner->name=$data[1];
                $examiner->first_name = isset($name[0])?$name[0]:'';
                $examiner->last_name = isset($name[1])?$name[1]:'';
                $examiner->email = $faker->email;
                $examiner->password = bcrypt('123456');
                $examiner->company_name = $faker->company;
                $examiner->company_address = $faker->address;
                $examiner->about_me = $data[6];
                $examiner->experience_1 = $data[7];
                $examiner->experience_2 = $data[8];
                $examiner->experience_3 = $data[9];
                $examiner->training_1 = $data[10];
                $examiner->training_2 = $data[11];
                $examiner->training_3 = $data[12];
                $examiner->price = $faker->numberBetween(199,10000);
                $examiner->type = 'examiner';
                $examiner->verify_status='verified';
                $examiner->picture=Storage::disk('public')->put($image,$imageContent);
                $examiner->is_fake=1;
                $examiner->save();
                $examiner->cities()->attach($cities);

                for ($i=1;$i<150;$i++){
                    $now=Carbon::now();
                    $now->addDays($i);
                    $availability=new ExaminerAvailability();
                    $availability->date=$now->toDateString();
                    $availability->update();

                    $now=$now->startOfDay();
                    for ($j=0;$j<48;$j++){
                        $now->addMinutes(30);
                        $AvTime=new AvailibiltyTime();
                        $AvTime->availability_id=$availability->id;
                        $AvTime->time=$now->format('H:i:s');
                        $AvTime->save();
                    }





                }




            }
            $i++;
        }
        return 'ok';
    }
    public function postExaminerCity(Request $request){
        $this->validate($request,['email'=>'required|email','name'=>'required','city'=>'required','message'=>'required|min:10']);
        Mail::to('kontakt@carspector.de')->send(new CityMail($request->email,$request->city));
        return redirect()->back()->with('success','Danke für deine Nachricht! Wir melden uns in Kürze.');

    }

    public function postContact(Request $request){
        $this->validate($request,['email'=>'required','name'=>'required','message'=>'required',
        'g-recaptcha-response' => 'required',
        ]);
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = '6LfYSIAqAAAAALZIvG3eV-N05iKUi4hQOYfTafIk';

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
        ]);

        $recaptchaData = $response->json();

        if (!$recaptchaData['success']) {
            return back()->withErrors(['g-recaptcha-response' => 'Bitte bestätigen Sie, dass Sie kein Roboter sind.'])->withInput();
        }

        Mail::to('kontakt@carspector.de')->send(new ContactMessage($request->name,$request->email,$request->message));
        return redirect()->back()->with('success','Danke für deine Nachricht! Wir melden uns in Kürze.');
//        abort(404);
    }





}
