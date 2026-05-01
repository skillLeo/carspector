<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->longText('serienausstattung_en')->nullable();
            $table->longText('sonderausstattung_en')->nullable();
            $table->longText('service_book_details_en')->nullable();
            $table->longText('vehicle_document_overall_comment_en')->nullable();

            $table->longText('vehicle_exam_condition_comment_en')->nullable();
            $table->longText('vehicle_tires_comment_en')->nullable();
            $table->longText('paint_general_comment_en')->nullable();
            $table->longText('body_general_comment_en')->nullable();
            $table->longText('lights_comment_en')->nullable();
            $table->longText('external_overall_comment_en')->nullable();
            $table->longText('technology_overall_comment_en')->nullable();
            $table->longText('test_drive_overall_comment_en')->nullable();
            $table->longText('interior_overall_comment_en')->nullable();
            $table->longText('other_en')->nullable();
            $table->longText('conclusion_en')->nullable();

            // Lighting EN "Sonstiges" arrays
            $table->longText('headlights_damages_other_en')->nullable();
            $table->longText('rear_lights_damages_other_en')->nullable();
            $table->longText('brake_light_damages_other_en')->nullable();
            $table->longText('reverse_light_damages_other_en')->nullable();
            $table->longText('indicator_damages_other_en')->nullable();
            $table->longText('hazard_lights_damages_other_en')->nullable();
            $table->longText('fog_lights_damages_other_en')->nullable();
            $table->longText('low_beam_damages_other_en')->nullable();
            $table->longText('interior_light_damages_other_en')->nullable();
            $table->longText('daytime_running_light_damages_other_en')->nullable();

            // Exterior/Mechanics EN "Sonstiges" arrays
            $table->longText('windshield_details_other_en')->nullable();
            $table->longText('window_glazing_details_other_en')->nullable();
            $table->longText('wipers_details_other_en')->nullable();
            $table->longText('seals_details_other_en')->nullable();
            $table->longText('central_locking_details_other_en')->nullable();
            $table->longText('attachments_details_other_en')->nullable();
            $table->longText('exterior_mirrors_details_other_en')->nullable();
            $table->longText('suspension_details_other_en')->nullable();
            $table->longText('shock_absorbers_details_other_en')->nullable();
            $table->longText('springs_details_other_en')->nullable();
            $table->longText('brake_discs_details_other_en')->nullable();
            $table->longText('brake_pads_details_other_en')->nullable();
            $table->longText('exhaust_system_details_other_en')->nullable();
            $table->longText('engine_oil_tightness_details_other_en')->nullable();
            $table->longText('gearbox_oil_tightness_details_other_en')->nullable();
            $table->longText('differential_oil_tightness_details_other_en')->nullable();
            $table->longText('underbody_condition_details_other_en')->nullable();
            $table->longText('other_findings_details_other_en')->nullable();

            // Interior EN "Sonstiges" arrays
            $table->longText('seat_belts_detail_other_en')->nullable();
            $table->longText('steering_wheel_detail_other_en')->nullable();
            $table->longText('dashboard_detail_other_en')->nullable();
            $table->longText('air_conditioning_detail_other_en')->nullable();
            $table->longText('heating_ventilation_detail_other_en')->nullable();
            $table->longText('sunroof_detail_other_en')->nullable();
            $table->longText('controls_detail_other_en')->nullable();
            $table->longText('window_lifters_detail_other_en')->nullable();
            $table->longText('rearview_mirror_detail_other_en')->nullable();
            $table->longText('seats_detail_other_en')->nullable();
            $table->longText('glove_box_detail_other_en')->nullable();
            $table->longText('radio_detail_other_en')->nullable();
            $table->longText('floor_detail_other_en')->nullable();
            $table->longText('paneling_detail_other_en')->nullable();
            $table->longText('headliner_detail_other_en')->nullable();
            $table->longText('horn_detail_other_en')->nullable();

            // Single EN notes
            $table->string('error_in_instrument_cluster_note_en')->nullable();
            $table->string('known_accident_damage_note_en')->nullable();
            $table->string('smell_detail_other_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->dropColumn([
                'serienausstattung_en',
                'sonderausstattung_en',
                'service_book_details_en',
                'vehicle_document_overall_comment_en',

                'vehicle_exam_condition_comment_en',
                'vehicle_tires_comment_en',
                'paint_general_comment_en',
                'body_general_comment_en',
                'lights_comment_en',
                'external_overall_comment_en',
                'technology_overall_comment_en',
                'test_drive_overall_comment_en',
                'interior_overall_comment_en',
                'other_en',
                'conclusion_en',
                'headlights_damages_other_en',
                'rear_lights_damages_other_en',
                'brake_light_damages_other_en',
                'reverse_light_damages_other_en',
                'indicator_damages_other_en',
                'hazard_lights_damages_other_en',
                'fog_lights_damages_other_en',
                'low_beam_damages_other_en',
                'interior_light_damages_other_en',
                'daytime_running_light_damages_other_en',
                'windshield_details_other_en',
                'window_glazing_details_other_en',
                'wipers_details_other_en',
                'seals_details_other_en',
                'central_locking_details_other_en',
                'attachments_details_other_en',
                'exterior_mirrors_details_other_en',
                'suspension_details_other_en',
                'shock_absorbers_details_other_en',
                'springs_details_other_en',
                'brake_discs_details_other_en',
                'brake_pads_details_other_en',
                'exhaust_system_details_other_en',
                'engine_oil_tightness_details_other_en',
                'gearbox_oil_tightness_details_other_en',
                'differential_oil_tightness_details_other_en',
                'underbody_condition_details_other_en',
                'other_findings_details_other_en',
                'seat_belts_detail_other_en',
                'steering_wheel_detail_other_en',
                'dashboard_detail_other_en',
                'air_conditioning_detail_other_en',
                'heating_ventilation_detail_other_en',
                'sunroof_detail_other_en',
                'controls_detail_other_en',
                'window_lifters_detail_other_en',
                'rearview_mirror_detail_other_en',
                'seats_detail_other_en',
                'glove_box_detail_other_en',
                'radio_detail_other_en',
                'floor_detail_other_en',
                'paneling_detail_other_en',
                'headliner_detail_other_en',
                'horn_detail_other_en',
                'error_in_instrument_cluster_note_en',
                'known_accident_damage_note_en',
                'smell_detail_other_en',
            ]);
        });
    }
};
