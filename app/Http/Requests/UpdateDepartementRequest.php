<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartementRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'link_website' => 'required|url', // Validasi format URL untuk link_website
            'tugas' => 'required', // Tugas harus diisi (tidak boleh kosong)
            'longitude' => 'nullable',
            'latitude' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Invalid email format.',
            'link_website.required' => 'The link_website field is required.',
            'link_website.url' => 'Invalid URL format for link_website.',
            'tugas.required' => 'The tugas field is required.',
            // Pesan validasi lainnya...
        ];
    }
}
