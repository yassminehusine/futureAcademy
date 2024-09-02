<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class user_coursesRequest extends FormRequest
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
            'pract_mark' => 'nullable',
            'total_mark' => 'nullable',
            'test_mark' => 'nullable',
            'grade' => 'nullable',
            'user_id' => 'required',
            'course_id' => 'required',
            'group_number' => 'nullable',
        ];
    }
}
