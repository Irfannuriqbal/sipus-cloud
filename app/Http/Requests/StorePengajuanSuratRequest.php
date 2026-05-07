<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'user';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'jenis_surat' => ['required', 'in:domisili,usaha,pengantar,tidak_mampu'],
            'nik' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:500'],
            'nomor_hp' => ['required', 'string', 'max:20'],
            'keperluan' => ['required', 'string', 'max:500'],
            'file_ktp' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            'file_kk' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'jenis_surat.required' => 'Jenis surat harus dipilih.',
            'jenis_surat.in' => 'Jenis surat tidak valid.',
            'nik.required' => 'NIK harus diisi.',
            'nik.max' => 'NIK maksimal 20 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
            'nomor_hp.max' => 'Nomor HP maksimal 20 karakter.',
            'keperluan.required' => 'Keperluan harus diisi.',
            'keperluan.max' => 'Keperluan maksimal 500 karakter.',
            'file_ktp.required' => 'File KTP harus diupload.',
            'file_ktp.file' => 'File KTP harus berupa file.',
            'file_ktp.mimes' => 'File KTP harus berformat PDF, JPG, JPEG, atau PNG.',
            'file_ktp.max' => 'File KTP maksimal 2MB.',
            'file_kk.required' => 'File KK harus diupload.',
            'file_kk.file' => 'File KK harus berupa file.',
            'file_kk.mimes' => 'File KK harus berformat PDF, JPG, JPEG, atau PNG.',
            'file_kk.max' => 'File KK maksimal 2MB.',
        ];
    }
}
