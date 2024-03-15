<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|string|max:500',
            'body' => 'required|string',
            'enabled' => 'required|boolean',
            'published_at' => 'nullable|date',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than :max characters.',
            'body.required' => 'The body field is required.',
            'published_at.date' => 'The published at must be a valid date.',
            'enabled.boolean' => 'The enabled field must be true or false.',
            'user_id' => 'The user must be selected',
        ];
    }
}
