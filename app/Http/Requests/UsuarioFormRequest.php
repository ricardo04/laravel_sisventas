<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'cedula'=>'max:16|required',
            'nombre'=>'max:100|required',
            'correo'=>'email|max:100',
            'password'=>'max:50',
            'telefono'=>'max:9|required',
            'direccion'=>'max:200|required',
            'idcargo'=>'required',
            'imagen'=>'nullable'
        ];
    }
}
