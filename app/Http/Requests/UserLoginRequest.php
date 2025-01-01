<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserLoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', Password::min(8)->letters()->numbers()],
        ];
    }
    
    public function messages(): array
    {
        return [
            // required message
            'email.required' => 'you must insert an email',
            'password.required' => 'you must insert a password',

            // exists message
            'email.exists' => 'inserted email/password is not valid',

            // email message
            'email.email' => 'please provide a valid email address',
        ];
    }
}
