<?php

namespace Piccolino\Http\Requests;

use Piccolino\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            'nombres' => 'required|max:99',
            'apellidos' => 'required|max:99',
            'tipodocumento' => 'required',
            'numerodocumento' => 'required',
            'fechanacimiento' => 'required',
            'genero' => 'required',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
