<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class B2bStoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vehicle_make_model' => ['required', 'string', 'max:200'],
            'make_year'          => ['nullable', 'string', 'max:10'],
            'mileage'            => ['nullable', 'string', 'max:20'],
            'vin_number'         => ['nullable', 'string', 'max:50'],
            'listing_link'       => ['nullable', 'url', 'max:500'],
            'vehicle_location'   => ['required', 'string', 'max:500'],
            'contact_person'     => ['required', 'string', 'max:100'],
            'contact_phone'      => ['required', 'string', 'max:30'],
            'inspection_type'    => ['required', 'in:Check XL,Check XXL'],
            'vehicle_country'    => ['required', 'string', 'max:100'],
            'soh_check'          => ['nullable', 'boolean'],
            'special_notes'      => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'vehicle_make_model' => 'Make & Model',
            'vin_number'         => 'VIN / Chassis Number',
            'listing_link'       => 'Listing Link',
            'vehicle_location'   => 'Vehicle Location',
            'contact_person'     => 'Contact Person',
            'contact_phone'      => 'Contact Phone',
            'inspection_type'    => 'Inspection Type',
            'vehicle_country'    => 'Vehicle Location Country',
        ];
    }
}
