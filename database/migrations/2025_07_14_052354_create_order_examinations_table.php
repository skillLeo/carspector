<?php

use App\Models\OrderExamination;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('examiner_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('assigned_by')->nullable();
            $table->string('weather_conditions')->nullable();
            $table->string('lighting_conditions')->nullable();
            $table->string('vehicle_clean')->nullable();
            $table->text('vehicle_freely_accessible')->nullable();
            $table->text('vehicle_exam_condition_comment')->nullable();


            //Fahrzeugdaten
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('body_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('first_registration')->nullable();
            $table->string('fuel')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_displacement')->nullable();
            $table->string('doors')->nullable();
            $table->string('power')->nullable();
            $table->string('next_hu')->nullable();
            $table->string('km_reading')->nullable();
            $table->string('emission_class')->nullable();
            $table->string('previous_owners')->nullable();
            $table->string('fin')->nullable();

            //Fahrzeugdokumente
            $table->enum('permits',['yes','no'])->nullable();
            $table->string('permits_details')->nullable();
            $table->enum('registration_certificate',['yes','no'])->nullable();
            $table->enum('vehicle_title',['yes','no'])->nullable();
            $table->enum('owner_manual',['yes','no'])->nullable();
            $table->enum('hu_au_report',['yes','no'])->nullable();
            $table->enum('service_book_type',['paper','digital','none'])->nullable();
            $table->enum('service_book_maintained',['yes','no','partial'])->nullable();
            $table->string('service_book_details')->nullable();
            $table->string('vehicle_document_overall_comment')->nullable();


            //Bereifung
            $table->enum('vl_type',['Sommer','Winter','4S'])->nullable();
            $table->double('tire_size_1')->nullable();
            $table->double('tire_size_2')->nullable();
            $table->double('tire_size_3')->nullable();
            $table->double('tire_profile')->nullable();
            $table->double('tire_dot')->nullable();
            $table->string('vl_comments')->nullable();

            $table->enum('vr_type',['Sommer','Winter','4S'])->nullable();
            $table->double('vr_tire_size_1')->nullable();
            $table->double('vr_tire_size_2')->nullable();
            $table->double('vr_tire_size_3')->nullable();
            $table->double('vr_tire_profile')->nullable();
            $table->double('vr_tire_dot')->nullable();
            $table->string('vr_comments')->nullable();

            //Karosserie
            $table->enum('front_bumper',['yes','no'])->nullable();
            $table->text('front_bumper_damage')->nullable();

            $table->enum('rear_bumper',['yes','no'])->nullable();
            $table->text('rear_bumper_damage')->nullable();

            $table->enum('grill',['yes','no'])->nullable();
            $table->text('grill_damage')->nullable();


            $table->enum('sill_left',['yes','no'])->nullable();
            $table->text('sill_left_damage')->nullable();

            $table->enum('sill_right',['yes','no'])->nullable();
            $table->text('sill_right_damage')->nullable();

            $table->enum('are_gap_ok',['yes','no'])->nullable();

            $table->text('body_general_comment')->nullable();


//            $table->enum('vehicle_registration_documents',['yes','no','unknown'])->nullable();
//            $table->string('vehicle_registration_document_comments')->nullable();

            //Lackdicke & -zustand
            $table->enum('bonnet_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('bonnet_paint_layer_thickness')->nullable();
            $table->enum('bonnet_repainted',['yes','no'])->nullable();
            $table->enum('bonnet_any_damage',['yes','no'])->nullable();
            $table->longText('bonnet_damages')->nullable();



            $table->enum('fender_vr_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('fender_vr_paint_layer_thickness')->nullable();
            $table->enum('fender_vr_repainted',['yes','no'])->nullable();
            $table->enum('fender_vr_any_damage',['yes','no'])->nullable();
            $table->longText('fender_vr_damages')->nullable();


            $table->enum('fender_vl_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('fender_vl_paint_layer_thickness')->nullable();
            $table->enum('fender_vl_repainted',['yes','no'])->nullable();
            $table->enum('fender_vl_any_damage',['yes','no'])->nullable();
            $table->longText('fender_vl_damages')->nullable();

            $table->enum('door_vl_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('door_vl_paint_layer_thickness')->nullable();
            $table->enum('door_vl_repainted',['yes','no'])->nullable();
            $table->enum('door_vl_any_damage',['yes','no'])->nullable();
            $table->longText('door_vl_damages')->nullable();


            $table->enum('door_hl_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('door_hl_paint_layer_thickness')->nullable();
            $table->enum('door_hl_repainted',['yes','no'])->nullable();
            $table->enum('door_hl_any_damage',['yes','no'])->nullable();
            $table->longText('door_hl_damages')->nullable();


            $table->enum('door_vr_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('door_vr_paint_layer_thickness')->nullable();
            $table->enum('door_vr_repainted',['yes','no'])->nullable();
            $table->enum('door_vr_any_damage',['yes','no'])->nullable();
            $table->longText('door_vr_damages')->nullable();

            $table->enum('door_hr_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('door_hr_paint_layer_thickness')->nullable();
            $table->enum('door_hr_repainted',['yes','no'])->nullable();
            $table->enum('door_hr_any_damage',['yes','no'])->nullable();
            $table->longText('door_hr_damages')->nullable();


            $table->enum('quarter_hl_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('quarter_hl_paint_layer_thickness')->nullable();
            $table->enum('quarter_hl_repainted',['yes','no'])->nullable();
            $table->enum('quarter_hl_any_damage',['yes','no'])->nullable();
            $table->longText('quarter_hl_damages')->nullable();


            $table->enum('quarter_hr_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('quarter_hr_paint_layer_thickness')->nullable();
            $table->text('quarter_hr_repainted')->nullable();
            $table->enum('quarter_hr_any_damage',['yes','no'])->nullable();
            $table->longText('quarter_hr_damages')->nullable();

            $table->enum('roof_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('roof_paint_layer_thickness')->nullable();
            $table->text('roof_repainted')->nullable();
            $table->enum('roof_any_damage',['yes','no'])->nullable();
            $table->longText('roof_damages')->nullable();

            $table->enum('tailgate_thickness_status',['messbar','nicht_messbar','nicht_vorhanden'])->nullable();
            $table->text('tailgate_paint_layer_thickness')->nullable();
            $table->text('tailgate_repainted')->nullable();
            $table->enum('tailgate_any_damage',['yes','no'])->nullable();
            $table->longText('tailgate_damages')->nullable();
            $table->longText('paint_general_comment')->nullable();

            //Tür VL
//            $table->double('door_vl_paint_layer_thickness')->nullable();
//            $table->enum('door_vl_repainted',['Ja','Nein'])->nullable();
//            $table->enum('door_vl_any_damage',['Ja','Nein'])->nullable();
//            $table->text('door_vl_damages')->nullable();
//            $table->string('door_vl_any_damage_comment')->nullable();
//
//            $table->double('door_vr_paint_layer_thickness')->nullable();
//            $table->enum('door_vr_repainted',['Ja','Nein'])->nullable();
//            $table->enum('door_vr_any_damage',['Ja','Nein'])->nullable();
//            $table->string('door_vr_any_damage_comment')->nullable();

            //Beleuchtung

            $table->enum('headlights',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('headlights_damages')->nullable();
            $table->text('headlights_damages_other')->nullable();

            $table->enum('rear_lights',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('rear_lights_damages')->nullable();
            $table->text('rear_lights_damages_other')->nullable();

            $table->enum('brake_light',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('brake_light_damages')->nullable();
            $table->text('brake_light_damages_other')->nullable();

            $table->enum('reverse_light',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('reverse_light_damages')->nullable();
            $table->text('reverse_light_damages_other')->nullable();

            $table->enum('indicator',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('indicator_damages')->nullable();
            $table->text('indicator_damages_other')->nullable();

            $table->enum('hazard_lights',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('hazard_lights_damages')->nullable();
            $table->text('hazard_lights_damages_other')->nullable();

            $table->enum('fog_lights',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('fog_lights_damages')->nullable();
            $table->text('fog_lights_damages_other')->nullable();

            $table->enum('low_beam',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('low_beam_damages')->nullable();
            $table->text('low_beam_damages_other')->nullable();

            $table->enum('interior_light',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('interior_light_damages')->nullable();
            $table->text('interior_light_damages_other')->nullable();

            $table->enum('daytime_running_light',['funktioniert','defekt','beschaedigt','nicht_vorhanden'])->nullable();
            $table->text('daytime_running_light_damages')->nullable();
            $table->text('daytime_running_light_damages_other')->nullable();

            $table->text('lights_comment')->nullable();


            //Außenzustand
            $table->enum('windshield', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('windshield_details')->nullable();
            $table->json('windshield_details_other')->nullable();

            $table->enum('window_glazing', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('window_glazing_details')->nullable();
            $table->json('window_glazing_details_other')->nullable();

            $table->enum('wipers', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('wipers_details')->nullable();
            $table->json('wipers_details_other')->nullable();

            $table->enum('seals', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('seals_details')->nullable();
            $table->json('seals_details_other')->nullable();

            $table->enum('central_locking', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('central_locking_details')->nullable();
            $table->json('central_locking_details_other')->nullable();

            $table->enum('attachments', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('attachments_details')->nullable();
            $table->json('attachments_details_other')->nullable();

            $table->enum('exterior_mirrors', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('exterior_mirrors_details')->nullable();
            $table->json('exterior_mirrors_details_other')->nullable();

            // === Rims ===
            $table->json('rims')->nullable();

            // === Mechanics ===
            $table->enum('suspension', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('suspension_details')->nullable();
            $table->json('suspension_details_other')->nullable();

            $table->enum('shock_absorbers', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('shock_absorbers_details')->nullable();
            $table->json('shock_absorbers_details_other')->nullable();

            $table->enum('springs', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('springs_details')->nullable();
            $table->json('springs_details_other')->nullable();

            $table->enum('brake_discs', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('brake_discs_details')->nullable();
            $table->json('brake_discs_details_other')->nullable();

            $table->enum('brake_pads', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('brake_pads_details')->nullable();
            $table->json('brake_pads_details_other')->nullable();

            $table->enum('exhaust_system', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('exhaust_system_details')->nullable();
            $table->json('exhaust_system_details_other')->nullable();

            $table->enum('engine_oil_tightness', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('engine_oil_tightness_details')->nullable();
            $table->json('engine_oil_tightness_details_other')->nullable();

            $table->enum('gearbox_oil_tightness', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('gearbox_oil_tightness_details')->nullable();
            $table->json('gearbox_oil_tightness_details_other')->nullable();

            $table->enum('differential_oil_tightness', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('differential_oil_tightness_details')->nullable();
            $table->json('differential_oil_tightness_details_other')->nullable();

            $table->enum('underbody_condition', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('underbody_condition_details')->nullable();
            $table->json('underbody_condition_details_other')->nullable();

            $table->enum('other_findings', ['i.O.', 'beschädigt', 'nicht_vorhanden'])->nullable();
            $table->json('other_findings_details')->nullable();
            $table->json('other_findings_details_other')->nullable();

            $table->text('external_overall_comment')->nullable();

            //Technik

            $table->text('engine_oil')->nullable();
            $table->string('engine_oil_comment')->nullable();
            $table->text('break_fluid')->nullable();
            $table->string('break_fluid_comment')->nullable();

            $table->text('general_engine_component')->nullable();
            $table->string('general_engine_component_comment')->nullable();


            $table->text('coolant')->nullable();
            $table->string('coolant_comment')->nullable();

            $table->text('next_inspection')->nullable();
            $table->string('next_inspection_comment')->nullable();
            $table->text('next_oil_change')->nullable();
            $table->string('next_oil_change_comment')->nullable();
            $table->text('technology_overall_comment')->nullable();



            $table->boolean('test_drive_done')->nullable()->default(0);
            $table->boolean('test_run_done')->nullable()->default(0);

            // Comments
            $table->text('test_drive_overall_comment')->nullable();

            // --- Probefahrt (Test Drive) ---
            $table->enum('td_engine_run', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_engine_run_note')->nullable();

            $table->enum('td_steering', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_steering_note')->nullable();

            $table->enum('td_clutch', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_clutch_note')->nullable();

            $table->enum('td_transmission', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_transmission_note')->nullable();

            $table->enum('td_speedometer', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_speedometer_note')->nullable();

            $table->enum('td_brake_feel', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_brake_feel_note')->nullable();

            $table->enum('td_strange_noises', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_strange_noises_note')->nullable();

            $table->enum('td_starter', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_starter_note')->nullable();

            $table->enum('td_timing', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('td_timing_note')->nullable();

            // --- Probelauf (Test Run) ---
            $table->enum('tr_starter', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('tr_starter_note')->nullable();

            $table->enum('tr_clutch', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('tr_clutch_note')->nullable();

            $table->enum('tr_engine_run', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('tr_engine_run_note')->nullable();

            $table->enum('tr_strange_noises', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('tr_strange_noises_note')->nullable();

            $table->enum('tr_timing', ['auffaellig', 'i.O.', 'nicht_vorhanden'])->nullable();
            $table->text('tr_timing_note')->nullable();
            //Probelauf/ fahrt


            $table->enum('test_drive_carried_out',['Ja','Nein','unknown'])->nullable();
            $table->string('test_drive_carried_out_comment')->nullable();

            $table->enum('engine_running',['Ja','Nein','unknown'])->nullable();
            $table->string('engine_running_comments')->nullable();

            $table->enum('coupling',['Ja','Nein','unknown'])->nullable();
            $table->string('coupling_comments')->nullable();

            //Innenraum

            foreach (\App\Models\OrderExamination::$fields as $field) {
                $table->enum($field, OrderExamination::$statusOptions)->nullable();
                $table->json("{$field}_detail")->nullable();
                $table->json("{$field}_detail_other")->nullable();
            }

            $table->enum('smell', OrderExamination::$smellOptions)->nullable();
            $table->string('smell_detail_other')->nullable();

            $table->text('interior_overall_comment')->nullable();

            //Sonstiges & Fazit

            $table->enum('error_in_instrument_cluster', ['Ja','Nein'])->nullable();
            $table->string('error_in_instrument_cluster_note')->nullable();
            $table->text('error_in_instrument_cluster_comments')->nullable();

            // Fehler im Fehlerspeicher
            $table->enum('error_in_error_memory', ['Ja','Nein','Keine Diagnose durchgeführt'])->nullable();
            $table->string('error_in_error_memory_note')->nullable();
            $table->text('error_in_error_memory_comments')->nullable();

            // Bekannte Unfallschäden
            $table->enum('known_accident_damage_status', [
                'Vorhanden & instandgesetzt',
                'Vorhanden & nicht instandgesetzt',
                'Kein Unfallwagen'
            ])->nullable();
            $table->string('known_accident_damage_note')->nullable();
            $table->text('known_accident_damage_comments')->nullable();

            // Repainting Comments (hidden field)
            $table->text('repainting_comments')->nullable();

            // Fazit
            $table->text('conclusion')->nullable();



            $table->text('photos')->nullable();

            $table->text('completed_steps')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_examinations');
    }
}
