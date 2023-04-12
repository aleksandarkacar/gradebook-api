<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|regex:/^(?=.*\d)[A-Za-z\d\s]{8,}$/|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'img_url' => 'required|string',
            'terms_and_conditions' => 'required|accepted',
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
            'regex' => 'The password must be at least 8 characters long and contain at least one number.',
            'password.min' => 'The password must be at least 8 characters long and contain at least one number.',
            'password.confirmed' => 'The password confirmation does not match.'
        ];
    }
}
