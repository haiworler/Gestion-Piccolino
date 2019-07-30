<?php

namespace Piccolino\Http\Requests;

use Piccolino\Http\Requests\Request;

class UserFormRequest extends Request
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
            'nombre' => 'required|max:99',
            'email2' => 'required|max:99',
            'rol' => 'required',
            'password2' => 'required',
            'idpersona'=>'required',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
