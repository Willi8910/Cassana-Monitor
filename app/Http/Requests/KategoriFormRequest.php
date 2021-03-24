<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
        'nama' => 'required|unique:kategoris|min:3',
        'deskripsi' =>'required|min:10'
       
        ];
    }

    public function messages()
    {
        return[
            'nama.required' => 'Nama tidak boleh kosong bro',
            'deskripsi.required' => 'Deskripsi jangan dikosongi juga bro',
            'nama.min' => 'Nama mosok kurang dari 5 huruf',
            'deskripsi.min' => 'jangan ngawur kalau buat deskripsi, minimal 10 karakter'
        ];
    }
}
