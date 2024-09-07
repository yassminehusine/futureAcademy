<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class submissionRequest extends FormRequest
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

            'submission_file' => 'nullable',
            'comment' => 'nullable',
            'submission_text' => 'nullable',
        ];
    }
}
