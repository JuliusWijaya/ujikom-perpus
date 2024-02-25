<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
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
            'kd_anggota'  => ['required', 'max:15'],
            'nm_anggota'  => 'required|string|max:120',
            'jk'          => 'required|in:L,P',
            'tp_lahir'    => 'required|max:130',
            'tg_lahir'    => 'required|date',
            'alamat'      => 'required',
            'no_hp'       => 'required|max_digits:13',
            'jns_anggota' => 'required|in:member,non member',
            'status'      => 'sometimes|in:active,inactive',
            'jml_pinjam'  => 'sometimes|integer'
        ];
    }
}
