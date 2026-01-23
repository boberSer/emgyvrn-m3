<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:100',
            'hours' => 'required|integer|max:10',
            'img' => 'required|image|mimes:jpeg,jpg|max:2000',
            'price' => 'required|integer|min:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'lessons_id' => 'integer|exists:lessons,id',
        ];
    }
}
