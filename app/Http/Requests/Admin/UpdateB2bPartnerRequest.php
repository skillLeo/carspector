<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateB2bPartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['required', 'string', 'max:255'],
            'logo'         => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }
}
