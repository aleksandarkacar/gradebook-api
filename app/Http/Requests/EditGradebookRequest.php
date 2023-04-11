<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditGradebookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|between:2,255',
            'user_id' => 'unique:gradebooks,user_id|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Gradebook Name field is required and must be between 2 and 255 characters',
            'user_id.unique' => 'Teacher already assigned to a gradebook',
            'user_id.exists' => 'You must select an availabe teacher'
        ];
    }
}
