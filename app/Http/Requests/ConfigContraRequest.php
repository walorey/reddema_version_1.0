<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigContraRequest extends FormRequest
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
            'password_actual' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
                'password_actual.required' => 'Debe ingresar la contraseña actual',
                'password.required' => 'Debe ingresar una nueva contraseña',
                'password.confirmed'=> 'Las contraseñas no coinciden'
        ];
    }
}
