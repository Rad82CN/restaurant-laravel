<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodUpdateRequest extends FormRequest
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
            'name' => 'required|min:1|max:40',
            'price' => 'required|integer|min:1',
            'image' => 'image',
            'description' => 'required|min:1|max:255',
            'category' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            // required message
            'name.required' => 'you must insert a name for this food',
            'price.required' => 'you must insert a price for this food',
            'description.required' => 'you must insert a description for this food',
            'category.required' => 'you must chose a category for this food',

            // integer message
            'price.integer' => 'you must insert numbers for price',
        ];
    }
}
