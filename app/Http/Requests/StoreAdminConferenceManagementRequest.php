<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminConferenceManagementRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'lecturers' => 'required|string', // Comma-separated lecturers
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'address' => 'required|string|max:255',
    ];
    }
}