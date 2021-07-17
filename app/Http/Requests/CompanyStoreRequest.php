<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:companies',
            'address' => 'min:3|max:255',
            'website' => 'active_url',
            'logo' => 'dimensions:min_width=100,min_height=100'
        ];
    }
}
