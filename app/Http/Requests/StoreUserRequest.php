<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users|max:255',
            'email_id' => 'required|unique:users|max:255',
            'password' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'dob' => 'required',
            'profile_pic' => 'required|mimes:jpg,jpeg,png|max:5048',
            'role_name' => 'required'
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
            'username.required' => 'Username is required',
            'username.unique' => 'Username should be unique',
            'email_id.required' => 'Email ID is required',
            'email_id.unique' => 'Email ID should be unique',
            'password.required' => 'Password is required',
            'address.required' => 'Password is required',
            'contact_no.required' => 'Contact is required',
            'dob.required' => 'DOB is required',
            'profile_pic.required' => 'Profile Pic is required',
            'profile_pic.mimes' => 'Profile Pic should be JPG, JPEG, PNG',
            'role_name.required' => 'Register As is required'
        ];
    }
}
