<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:60',
            'category' => 'required',
            'animal_type' => 'required',
            'zone' => 'required',
            'images[]' => 'image',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Debe ingresar un título',
            'title.max' => 'El título no puede superar los 60 caracteres',
            'category.required'  => 'Debe ingresar una categoría',
            'animal_type.required' => 'Debe especificar el tipo de animal',
            'zone.required' => 'Debe especificar una zona',
            'images[].image' =>'Solo puede subir archivos del tipo imagen',
            'description.required' => 'Ingrese detalles',

        ];
    }
}
