<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'nullable',
            'role' => 'required',
            'academic_level' => 'nullable',
            'GPA' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'department_id' => 'required',
            'password' => 'required',
        ];
    }
    
}
