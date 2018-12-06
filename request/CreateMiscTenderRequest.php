<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateMiscTenderRequest extends FormRequest
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
        $rules = [
            'type' => 'required|min:2|max:191',
            'topics' => 'required|min:2|max:191',
            'attach' => 'required|image|mimes:jpeg,jpg,png|max:10000',
            'pub_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'attach.required' => 'The attachment field is required.',
        ];
    }
}
