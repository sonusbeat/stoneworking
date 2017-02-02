<?php

namespace Stoneworking\Http\Requests;

use Auth;
use Illuminate\Routing\Route;
use Stoneworking\Http\Requests\Request;

class CategoriesRequest extends Request
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
            'name'       => 'required|between:4,150',
            'permalink'   => [
                'required',
                'between:4,180',
                'unique:categories,permalink,'.$route->getParameter('categories')
            ],
            /* ------------------------------ SEO ------------------------------ */
            'meta_title'       => 'max:70',
            'meta_description' => 'max:165'
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
            'name.required'        => '¡ Escriba el nombre de la categoría !',
            'name.between'         => '¡ El nombre de la categoría debe ser de :min a :max  caracteres !',

            'permalink.required'   => '¡ Escriba el enlace permanente !',
            'permalink.between'    => '¡ El enlace permanente debe ser de :min a :max caracteres !',
            'permalink.unique'     => '¡ El enlace permanente ya ha sido utilizado, Elija Otro !',

            'meta_title.max' => 'El titulo seo no debe ser mayor a :max caracteres',
            'meta_description.max' => 'La descripción seo no debe ser mayor a :max caracteres',
        ];
    }
}
