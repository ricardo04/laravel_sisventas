<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoFormRequest extends FormRequest
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
            'cedula'=>'max:17|required',
            'nombre1'=>'max:30|required',
            'nombre2'=>'max:30',
            'apellido1'=>'max:30|required',
            'apellido2'=>'max:30',
            'telefono'=>'max:9',
            'idproveedor'=>'required'
        ];
    }
}
