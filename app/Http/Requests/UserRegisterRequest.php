<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
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
            'username' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()], // name of the confirmation field must be password_confirmation
        ];
    }

    public function messages(): array
    {
        return [
            // required message
            'username.required' => 'you must insert a username',
            'email.required' => 'you must insert an email',
            'password.required' => 'you must insert a password',

            // unique message
            'email.unique' => 'your inserted email must be unique (its taken)',

            // email message
            'email.email' => 'please provide a valid email address',
        ];
    }
}
