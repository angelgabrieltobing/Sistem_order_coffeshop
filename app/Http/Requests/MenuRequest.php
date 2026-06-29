<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Authorization
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            'nama' => [
                'required',
                'string',
                'max:255'
            ],

            'kategori' => [
                'required',
                'string',
                'max:100'
            ],

            'harga' => [
                'required',
                'numeric',
                'min:1000'
            ],

            'deskripsi' => [
                'nullable'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

            'status' => [
                'required',
                'in:Tersedia,Habis'
            ],

        ];
    }

    /**
     * Validation Message
     */
    public function messages(): array
    {
        return [

            'nama.required' => 'Nama menu wajib diisi.',

            'kategori.required' => 'Kategori wajib dipilih.',

            'harga.required' => 'Harga wajib diisi.',

            'harga.numeric' => 'Harga harus berupa angka.',

            'gambar.image' => 'File harus berupa gambar.',

            'status.required' => 'Status wajib dipilih.',

        ];
    }
}