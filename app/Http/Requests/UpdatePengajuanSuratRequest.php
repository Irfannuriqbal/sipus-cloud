<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengajuanSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'in:diproses,ditolak,selesai'],
            'catatan_admin' => ['nullable', 'string', 'max:500'],
            'file_surat' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status tidak valid.',
            'catatan_admin.max' => 'Catatan admin maksimal 500 karakter.',
            'file_surat.file' => 'File surat harus berupa file.',
            'file_surat.mimes' => 'File surat harus berformat PDF.',
            'file_surat.max' => 'File surat maksimal 5MB.',
        ];
    }
}
