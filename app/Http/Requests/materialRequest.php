<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materialRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'file_path' => 'nullable|file|mimes:pdf,doc,docx,txt|max:2048', 
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,txt', 
            'thumbnail_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id',
            'courses_id' => 'required|exists:courses,id',
        ];
    }
}
