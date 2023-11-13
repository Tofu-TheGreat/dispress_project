<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest
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
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'isi_surat' => 'required|max:100',
            'pengirim_surat' => 'required',
            'id_user' => 'required',
            'scan_dokumen' => 'required|mimes:pdf, docx|file',
        ];
    }
    public function messages()
    {
        return [
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'tanggal_surat.required' => 'Tanggal surat harus diisi',
            'tanggal_surat.date' => 'Tanggal surat salah',
            'isi_surat.required' => 'Isi surat harus diisi',
            'isi_surat.max' => 'Isi surat tidak boleh lebih dari 100 karakter',
            'pengirim_surat.required' => 'Pengirim surat harus diisi',
            'id_user.required' => 'Penerima surat harus diisi',
            'scan_dokumen.required' => 'Harus menyertakan scan surat!',
            'scan_dokumen.mimes' => 'Tipe file harus pdf, docx',
            'scan_dokumen.file' => 'Harus berupa file!',
        ];
    }
}