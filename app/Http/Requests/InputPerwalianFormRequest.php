<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputPerwalianFormRequest extends FormRequest
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
        'nama' => 'required|min:1',
        'tanggal_mulai' => 'required|min:1',
        'tanggal_selesai' =>'required|min:1',
        //'nama_dosen' =>'required|min:1',
       
        ];
    }
}
