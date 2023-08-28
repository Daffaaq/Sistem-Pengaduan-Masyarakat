<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'answer' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'answer.required' => 'A response to the complaint is required.',
            'answer.string'  => 'The response must be a string.',
        ];
    }
}
