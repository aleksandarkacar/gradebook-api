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
}
