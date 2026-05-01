<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_examination_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examination_id')->index();

            // Section comments EN
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
            $table->string('next_inspection_en')->nullable();
            $table->string('next_oil_change_en')->nullable();
            $table->longText('test_drive_overall_comment_en')->nullable();
            $table->longText('interior_overall_comment_en')->nullable();
            $table->longText('other_en')->nullable();
            $table->longText('conclusion_en')->nullable();

            // Lighting EN other arrays
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

            // Exterior/mechanics EN other arrays
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

            // Interior EN other arrays
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
            $table->string('error_in_error_memory_note_en')->nullable();
            $table->string('smell_detail_other_en')->nullable();

            // Paint damages EN (per part), JSON { part_key: [values...] }
            $table->longText('paint_damages_en')->nullable();

            $table->string('td_engine_run_note_en')->nullable();
            $table->string('td_steering_note_en')->nullable();
            $table->string('td_clutch_note_en')->nullable();
            $table->string('td_transmission_note_en')->nullable();
            $table->string('td_speedometer_note_en')->nullable();
            $table->string('td_brake_feel_note_en')->nullable();
            $table->string('td_strange_noises_note_en')->nullable();
            $table->string('td_starter_note_en')->nullable();
            $table->string('td_timing_note_en')->nullable();

            $table->string('tr_starter_note_en')->nullable();
            $table->string('tr_clutch_note_en')->nullable();
            $table->string('tr_engine_run_note_en')->nullable();
            $table->string('tr_strange_noises_note_en')->nullable();
            $table->string('tr_timing_note_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_examination_translations');
    }
};
            // Test drive/run EN notes (conditional)
