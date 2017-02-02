<?php

namespace Stoneworking\Http\Requests;

use Auth;
use Stoneworking\Http\Requests\Request;

class UsersCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->type == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|between:4,250',
            'username' => 'required|between:4,50|unique:users,username',
            'email'    => 'required|email|between:4,200|unique:users,email',

            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',

            'type' => 'required',

            'image' => 'mimes:jpg,jpeg|max:2000'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '¡ Escriba su nombre completo por favor !',
            'name.between'  => 'Su nombre debe ser de :min a :max caracteres',

            'username.required' => '¡ Escriba un nombre de usuario !',
            'username.unique'   => 'El nombre de usuario ya está en uso, ¡ Elija otro por favor !',
            'username.between'  => 'El nombre de usuario debe ser de :min a :max caracteres',

            'email.required' => '¡ Escriba su correo electrónico por favor !',
            'email.email'    => '¡ Formato incorrecto de email !',
            'email.between'  => 'El email debe ser de :min a :max caracteres',
            'email.unique'   => '¡ El :attribute ya ha sido utilizado elija otro !',

            'password.required' => '¡ Escriba su contraseña por favor !',
            'password.confirmed' => '¡ No coinciden las contraseñas !',

            'password_confirmation.required' => '¡ Repita su contraseña !',
            'password_confirmation.same'     => '¡ No coinciden las contraseñas !',

            'type.required' => '¡ Elija el tipo de usuario !',
        ];
    }
}
