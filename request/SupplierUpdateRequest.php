<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:191',
            'email' => 'nullable|email|unique:suppliers,email,'.$this->route('supplier')->id,
            'phone' => 'required|string',
            'company_name' => 'nullable|string',
            'company_address' => 'nullable|string',
            'registration_no' => 'nullable|string'
        ];
    }
}
