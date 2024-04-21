<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'fullname' => 'required|max:255',
            'address' => 'required',
            'contact_no' => 'required',
            'dob' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fullname.required' => 'Fullname is required',
            'address.required' => 'Address is required',
            'contact_no.required' => 'Contact is required',
            'dob.required' => 'DOB is required'
        ];
    }
}
