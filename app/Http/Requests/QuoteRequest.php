<?php

namespace Stoneworking\Http\Requests;

use Illuminate\Http\Request as RequestForm;
use Stoneworking\Http\Requests\Request;

class QuoteRequest extends Request
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
    public function rules(RequestForm $request)
    {
        $blueprint = $request->blueprint[0];

        $rules = [
            'name'      => 'required|between:4,100',
            'mobile'    => 'required|between:4,100',
            'email'     => 'required|between:4,100|email',
            'image'     => 'required|mimes:jpeg',
            'blueprint' => 'required',
            'message'   => 'min:4'
        ];

        switch ($blueprint) :
            case 'single':
                $rules['size-1'] = 'required|between:4,100';
                break;
            case 'squared':
                $rules['size-1'] = 'required|between:4,100';
                $rules['size-2'] = 'required|between:4,100';
                break;
            case 'u':
                $rules['size-1'] = 'required|between:4,100';
                $rules['size-2'] = 'required|between:4,100';
                $rules['size-3'] = 'required|between:4,100';
                break;
            case 'double':
                $rules['size-2'] = 'required|between:4,100';
                break;
        endswitch;

        session()->flash('display', true);

        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => '¡ Escriba su nombre por favor !',
            'name.between'       => '¡ Su nombre debe ser de :min a :max caracteres !',
            'mobile.required'    => '¡ Escriba su teléfono celular por favor !',
            'mobile.between'     => '¡ Su teléfono debe ser de :min a :max caracteres !',
            'email.required'     => '¡ Escriba su correo electrónico por favor !',
            'email.between'      => '¡ Su correo electrónico debe ser de :min a :max caracteres !',
            'email.email'        => '¡ Formato incorrecto de email !',
            'image.required'     => '¡ Seleccione una imagen del area de instalación por favor !',
            'image.mimes'         => '¡ Solo se admiten imagenes en formato JPG !',
            'blueprint.required' => '¡ Seleccione un plano !',
            'size-1.required'    => '¡ Agregue la medida 1 !',
            'size-2.required'    => '¡ Agregue la medida 2 !',
            'size-3.required'    => '¡ Agregue la medida 3 !',
            'size-1.between'     => '¡ El tamaño debe ser de :min a :max caracteres !',
            'size-2.between'     => '¡ El tamaño debe ser de :min a :max caracteres !',
            'size-3.between'     => '¡ El tamaño debe ser de :min a :max caracteres !',
            'message.min'        => 'Su mensaje debe ser por lo menos de :min caracteres'
        ];
    }
}
