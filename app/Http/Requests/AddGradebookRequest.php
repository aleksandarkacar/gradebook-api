<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGradebookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,255',
            'user_id' => 'required|unique:gradebooks,user_id|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Gradebook Name field is required and must be between 2 and 255 characters',
            'user_id.required' => 'You must select a teacher',
            'user_id.unique' => 'Teacher already assigned to a gradebook',
            'user_id.exists' => 'You must select an availabe teacher'
        ];
    }
}
