<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
            'user_name' => 'required|min:1|max:40',
            'user_email' => ['required', 'email'],
            'request' => 'min:1|max:255',
            'seats' => 'required',
            'date' => 'required|date_format:Y-m-d|after_or_equal:today',
        ];
    }
    
    public function messages(): array
    {
        return [
            // required message
            'user_name.required' => 'you must insert a name for this food',
            'user_email.required' => 'you must insert an email',
            'seats.required' => 'you must reserve seats',
            'date.required' => 'you must choose a date for your booking',

            // date
            'date.after_or_equal' => 'you must book a table for atleast tommorow',
        ];
    }
}
