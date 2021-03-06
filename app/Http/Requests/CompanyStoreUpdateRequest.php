<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreUpdateRequest extends FormRequest
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
            'email' => [
                'required',
                Rule::unique('companies')->ignore($this->id),
            ],
            'address' => 'min:3|max:255',
            'website' => 'active_url',
            'company_logo' => 'mimes:jpg,bmp,png|dimensions:min_width=100,min_height=100'
        ];
    }

    /**
     * @return bool
     */
    public function hasLogo(): bool
    {
        return isset($this->company_logo);
    }
}
