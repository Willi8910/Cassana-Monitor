<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahClassFormRequest extends FormRequest
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
            //
        return [
        'kp' => 'required|min:1',
        'kapasitas' => 'required|min:1',
        'matakuliah_id' =>'required|min:1',
        'dosen_id' =>'required|min:1',
        //'nama_dosen' =>'required|min:1',
       
        ];
       
    }
}
