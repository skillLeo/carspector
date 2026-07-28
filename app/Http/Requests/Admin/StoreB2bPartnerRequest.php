<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreB2bPartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'unique:b2b_partners,email'],
            'logo'         => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }
}
