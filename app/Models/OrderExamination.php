<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExamination extends Model
{
    use HasFactory;

    // Allow creating with order_id via mass assignment
    protected $fillable = ['order_id'];

    public static array $statusOptions = [
        'i.O.',
        'beschädigt',
        'nicht_vorhanden',
    ];

    public static array $smellOptions = [
        'i.O. / neutral',
        'Rauch',
        'Tiergeruch',
        'Feuchtigkeit / Schimmel',
        'Kraftstoff',
        'Öl / Kühlmittel',
        'Sonstiges',
    ];

    // all keys used in form
    public static array $fields = [
        'seat_belts','steering_wheel','dashboard','air_conditioning',
        'heating_ventilation','sunroof','controls','window_lifters',
        'rearview_mirror','seats','glove_box','radio','floor',
        'paneling','headliner','horn'
    ];

    protected $casts=[
        'damages'=>'array',
        'repaintings'=>'array',
        'errors'=>'array',
        'known_accident_damages'=>'array',
        'completed_steps'=>'array',
        'tires'=>'array',
        'front_bumper_damage'=>'array',
        'rear_bumper_damage'=>'array',
        'grill_damage'=>'array',
        'sill_left_damage'=>'array',
        'sill_right_damage'=>'array',
        'bonnet_damages'=>'array',
        'fender_vr_damages'=>'array',
        'fender_vl_damages'=>'array',
        'door_vl_damages'=>'array',
        'door_hl_damages'=>'array',
        'door_vr_damages'=>'array',
        'door_hr_damages'=>'array',
        'quarter_hl_damages'=>'array',
        'quarter_hr_damages'=>'array',
        'roof_damages'=>'array',
        'tailgate_damages'=>'array',
        'headlights_damages'=>'array',
        'headlights_damages_other'=>'array',
        'rear_lights_damages'=>'array',
        'rear_lights_damages_other'=>'array',
        'brake_light_damages'=>'array',
        'brake_light_damages_other'=>'array',
        'reverse_light_damages'=>'array',
        'reverse_light_damages_other'=>'array',
        'indicator_damages'=>'array',
        'indicator_damages_other'=>'array',
        'hazard_lights_damages'=>'array',
        'hazard_lights_damages_other'=>'array',
        'fog_lights_damages'=>'array',
        'fog_lights_damages_other'=>'array',
        'low_beam_damages'=>'array',
        'low_beam_damages_other'=>'array',
        'interior_light_damages'=>'array',
        'interior_light_damages_other'=>'array',
        'daytime_running_light_damages'=>'array',
        'daytime_running_light_damages_other'=>'array',
        'headlights_damages_other_en'=>'array',
        'rear_lights_damages_other_en'=>'array',
        'brake_light_damages_other_en'=>'array',
        'reverse_light_damages_other_en'=>'array',
        'indicator_damages_other_en'=>'array',
        'hazard_lights_damages_other_en'=>'array',
        'fog_lights_damages_other_en'=>'array',
        'low_beam_damages_other_en'=>'array',
        'interior_light_damages_other_en'=>'array',
        'daytime_running_light_damages_other_en'=>'array',


        'windshield_details' => 'array',
        'windshield_details_other' => 'array',
        'windshield_details_other_en' => 'array',

        'window_glazing_details' => 'array',
        'window_glazing_details_other' => 'array',
        'window_glazing_details_other_en' => 'array',

        'wipers_details' => 'array',
        'wipers_details_other' => 'array',
        'wipers_details_other_en' => 'array',

        'seals_details' => 'array',
        'seals_details_other' => 'array',
        'seals_details_other_en' => 'array',

        'central_locking_details' => 'array',
        'central_locking_details_other' => 'array',
        'central_locking_details_other_en' => 'array',

        'attachments_details' => 'array',
        'attachments_details_other' => 'array',
        'attachments_details_other_en' => 'array',

        'exterior_mirrors_details' => 'array',
        'exterior_mirrors_details_other' => 'array',
        'exterior_mirrors_details_other_en' => 'array',

        'rims' => 'array',

        'suspension_details' => 'array',
        'suspension_details_other' => 'array',
        'suspension_details_other_en' => 'array',

        'shock_absorbers_details' => 'array',
        'shock_absorbers_details_other' => 'array',
        'shock_absorbers_details_other_en' => 'array',

        'springs_details' => 'array',
        'springs_details_other' => 'array',
        'springs_details_other_en' => 'array',

        'brake_discs_details' => 'array',
        'brake_discs_details_other' => 'array',
        'brake_discs_details_other_en' => 'array',

        'brake_pads_details' => 'array',
        'brake_pads_details_other' => 'array',
        'brake_pads_details_other_en' => 'array',

        'exhaust_system_details' => 'array',
        'exhaust_system_details_other' => 'array',
        'exhaust_system_details_other_en' => 'array',

        'engine_oil_tightness_details' => 'array',
        'engine_oil_tightness_details_other' => 'array',
        'engine_oil_tightness_details_other_en' => 'array',

        'gearbox_oil_tightness_details' => 'array',
        'gearbox_oil_tightness_details_other' => 'array',
        'gearbox_oil_tightness_details_other_en' => 'array',

        'differential_oil_tightness_details' => 'array',
        'differential_oil_tightness_details_other' => 'array',
        'differential_oil_tightness_details_other_en' => 'array',

        'underbody_condition_details' => 'array',
        'underbody_condition_details_other' => 'array',
        'underbody_condition_details_other_en' => 'array',

        'other_findings_details' => 'array',
        'other_findings_details_other' => 'array',
        'other_findings_details_other_en' => 'array',
        'seat_belts_detail' => 'array',
        'seat_belts_detail_other' => 'array',
        'seat_belts_detail_other_en' => 'array',
        'steering_wheel_detail' => 'array',
        'steering_wheel_detail_other' => 'array',
        'steering_wheel_detail_other_en' => 'array',
        'dashboard_detail' => 'array',
        'dashboard_detail_other' => 'array',
        'dashboard_detail_other_en' => 'array',
        'air_conditioning_detail' => 'array',
        'air_conditioning_detail_other' => 'array',
        'air_conditioning_detail_other_en' => 'array',
        'heating_ventilation_detail' => 'array',
        'heating_ventilation_detail_other' => 'array',
        'heating_ventilation_detail_other_en' => 'array',
        'sunroof_detail' => 'array',
        'sunroof_detail_other' => 'array',
        'sunroof_detail_other_en' => 'array',
        'controls_detail' => 'array',
        'controls_detail_other' => 'array',
        'controls_detail_other_en' => 'array',
        'window_lifters_detail' => 'array',
        'window_lifters_detail_other' => 'array',
        'window_lifters_detail_other_en' => 'array',
        'rearview_mirror_detail' => 'array',
        'rearview_mirror_detail_other' => 'array',
        'rearview_mirror_detail_other_en' => 'array',
        'seats_detail' => 'array',
        'seats_detail_other' => 'array',
        'seats_detail_other_en' => 'array',
        'glove_box_detail' => 'array',
        'glove_box_detail_other' => 'array',
        'glove_box_detail_other_en' => 'array',
        'radio_detail' => 'array',
        'radio_detail_other' => 'array',
        'radio_detail_other_en' => 'array',
        'floor_detail' => 'array',
        'floor_detail_other' => 'array',
        'floor_detail_other_en' => 'array',
        'paneling_detail' => 'array',
        'paneling_detail_other' => 'array',
        'paneling_detail_other_en' => 'array',
        'headliner_detail' => 'array',
        'headliner_detail_other' => 'array',
        'headliner_detail_other_en' => 'array',
        'horn_detail' => 'array',
        'horn_detail_other' => 'array',
        'horn_detail_other_en' => 'array',

    ];


    public function nextInspection1Attribute()
    {
        if($this->next_inspection){
            $date=Carbon::parse($this->next_inspection);
            return $date->format('Y-m-d');
        }

    }
    public function nextOilChange1Attribute()
    {
        if($this->next_oil_change){
            $date=Carbon::parse($this->next_oil_change);
            return $date->format('Y-m-d');
        }

    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');

    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }
    public function examiner()
    {
        return $this->belongsTo(User::class,'examiner_id');

    }


    public function images()
    {
        return $this->hasMany(ExaminationImage::class,'examination_id');
    }

    public function translation()
    {
        return $this->hasOne(OrderExaminationTranslation::class, 'examination_id');
    }


}
