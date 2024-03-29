<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'department_id' => 'required|exists:departements,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'longitude' => 'nullable', // Add validation rule for longitude
            'latitude' => 'nullable',  // Add validation rule for latitude
        ];
    }
}
