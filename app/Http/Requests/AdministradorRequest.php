<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class AdministradorRequest extends FormRequest
{
    use PasswordValidationRules;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'cedula_useradmin' => 'required|integer|unique:ciudadanos,cedula|min:10',
            'nombre_useradmin' => 'required|string|min:3',
            'apellido_useradmin' => 'required|string|min:3',
            'sexo_useradmin' => 'required|string|min:1',
            'fecha_nacimiento_useradmin' => 'required|date',
            'email_useradmin' => 'required|email|unique:ciudadanos,correo|max:30|min:3',
            'tlf_useradmin' => 'required|string|unique:ciudadanos,nro_telefono|min:6',
            'estado_useradmin' => 'required',
            'municipio_useradmin' => 'required',
            'parroquia_useradmin' => 'required',
            'password' => ['required', 'string', $this->passwordRules(),'confirmed']
        ];
    }
}
