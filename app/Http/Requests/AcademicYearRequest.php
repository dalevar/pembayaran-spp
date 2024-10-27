<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicYearRequest extends FormRequest
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
            'year_start'    => 'required|numeric|min:2000',
            'year_end'      => 'required|numeric|gt:year_start',
            'description'   => 'nullable|string|max:255',
            'status'        => 'required|in:active,inactive'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'year_start.required'   => 'Tahun mulai wajib diisi',
            'year_end.required'     => 'Tahun berakhir wajib diisi',
            'status.required'       => 'Status wajib dipilih',
            'year_start.numeric'    => 'Tahun mulai hanya boleh angka',
            'year_end.numeric'      => 'Tahun berakhir hanya boleh angka',
            'year_start.min'        => 'Tahun mulai minimal 2000',
            'year_end.gt'           => 'Tahun berakhir harus lebih besar dari tahun mulai'
        ];
    }
}
