<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahKelasFormRequest extends FormRequest
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
        'kode_matkul' => 'required|min:1',
        'nama' => 'required|min:1',
        'jumlah_sks' =>'required|min:1',
        'semester' =>'required|min:1',
        //'nama_dosen' =>'required|min:1',
       
        ];
    }
    public function messages()
    {
        return[
            'kode_matkul.required' => 'Nama tidak boleh kosong bro',
            'nama.required' => 'Deskripsi jangan dikosongi juga bro',
            'jumlah_sks.required' => 'Gak kosong',
            'semester.required' => 'semester'
        ];
    }
}
