<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KoleksiRequest extends FormRequest
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
            'kd_koleksi'  => ['required', 'max:30', Rule::unique('koleksis', 'kd_koleksi')->ignore($this->id)],
            'judul'       => ['required', 'string', Rule::unique('koleksis', 'judul')->ignore($this->id)],
            'jns_bahan_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media'   => 'required',
            'pengarang'   => 'required|string|max:120',
            'penerbit'    => 'required|in:deepublish,bukunesia,grasindo,gramedia,erlangga',
            'tahun'       => 'required|numeric',
            'cetakan'     => 'required',
            'edisi'       => 'required',
            'status'      => 'nullable|in:active,inactive',
        ];
    }
}
