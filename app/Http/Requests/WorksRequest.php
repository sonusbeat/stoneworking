<?php

namespace Stoneworking\Http\Requests;

use Auth;
use Illuminate\Routing\Route;
use Stoneworking\Http\Requests\Request;

class WorksRequest extends Request
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
    public function rules(Route $route)
    {
        return [
            'category_id' => 'numeric',
            'name'        => 'required|between:4,150',
            'permalink'   => 'required|between:4,200|unique:works,permalink,'
                              .$route->getParameter('works'),
            'image'       => 'mimes:jpg,jpeg',
            'image_alt'   => 'between:4,255',

            'meta_title'       => 'max:70',
            'meta_description' => 'max:165',
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
            'category_id.numeric'  => 'El valor de la categoría debe ser numérico',
            'name.required'        => '¡ Escriba el nombre del trabajo !',
            'name.between'         => '¡ El nombre del trabajo debe ser entre :min a :max  caracteres !',
            'permalink.required'   => '¡ Escriba el enlace permanente !',
            'permalink.between'    => '¡ El enlace permanente debe ser entre :min a :max  caracteres !',
            'permalink.unique'     => '¡ El enlace permanente ya ha sido utilizado, Elija Otro !',
            'image.mimes'          => '¡ El formato de la imagen debe ser JPG !',
            'image_alt.between'    => '¡ El texto alternativo de la imagen debe ser entre :min a :max  caracteres !',
            'meta_title.max'       => 'El título seo debe ser menor a :max caracteres',
            'meta_description.max' => 'La descripción seo debe ser menor a :max caracteres',
        ];
    }
}
