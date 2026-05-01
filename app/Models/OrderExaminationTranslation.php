<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExaminationTranslation extends Model
{
    use HasFactory;

    protected $table = 'order_examination_translations';
    protected $guarded = [];

    protected $casts = [
        // Lighting
        'headlights_damages_other_en' => 'array',
        'rear_lights_damages_other_en' => 'array',
        'brake_light_damages_other_en' => 'array',
        'reverse_light_damages_other_en' => 'array',
        'indicator_damages_other_en' => 'array',
        'hazard_lights_damages_other_en' => 'array',
        'fog_lights_damages_other_en' => 'array',
        'low_beam_damages_other_en' => 'array',
        'interior_light_damages_other_en' => 'array',
        'daytime_running_light_damages_other_en' => 'array',

        // Exterior / mechanics
        'windshield_details_other_en' => 'array',
        'window_glazing_details_other_en' => 'array',
        'wipers_details_other_en' => 'array',
        'seals_details_other_en' => 'array',
        'central_locking_details_other_en' => 'array',
        'attachments_details_other_en' => 'array',
        'exterior_mirrors_details_other_en' => 'array',
        'suspension_details_other_en' => 'array',
        'shock_absorbers_details_other_en' => 'array',
        'springs_details_other_en' => 'array',
        'brake_discs_details_other_en' => 'array',
        'brake_pads_details_other_en' => 'array',
        'exhaust_system_details_other_en' => 'array',
        'engine_oil_tightness_details_other_en' => 'array',
        'gearbox_oil_tightness_details_other_en' => 'array',
        'differential_oil_tightness_details_other_en' => 'array',
        'underbody_condition_details_other_en' => 'array',
        'other_findings_details_other_en' => 'array',

        // Interior
        'seat_belts_detail_other_en' => 'array',
        'steering_wheel_detail_other_en' => 'array',
        'dashboard_detail_other_en' => 'array',
        'air_conditioning_detail_other_en' => 'array',
        'heating_ventilation_detail_other_en' => 'array',
        'sunroof_detail_other_en' => 'array',
        'controls_detail_other_en' => 'array',
        'window_lifters_detail_other_en' => 'array',
        'rearview_mirror_detail_other_en' => 'array',
        'seats_detail_other_en' => 'array',
        'glove_box_detail_other_en' => 'array',
        'radio_detail_other_en' => 'array',
        'floor_detail_other_en' => 'array',
        'paneling_detail_other_en' => 'array',
        'headliner_detail_other_en' => 'array',
        'horn_detail_other_en' => 'array',
        'paint_damages_en' => 'array',
    ];

    public function examination()
    {
        return $this->belongsTo(OrderExamination::class, 'examination_id');
    }
}
