<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class assignmentRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'file_path' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'course_id' => 'required',
            'video_url' => 'required',
            'year' => 'required',
            'due_date' => 'required',
        ];
    }
}
