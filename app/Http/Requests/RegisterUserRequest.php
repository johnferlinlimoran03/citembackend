<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all requests by default
    }

public function rules()
{
    return [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|alpha_num|unique:users,username',
        'password' => 'required|min:8|confirmed',
        'participation_type' => 'required|in:Buyer,Exhibitor,Visitor',
        'company_name' => 'required',
        'address' => 'required',
        'city' => 'required',
        'region' => 'required',
        'country' => 'required',
        'year_established' => 'required|digits:4|max:' . date('Y'),
        'website' => 'nullable|url',
        'brochure' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ];
}

}
