<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'cedula_doctor' => 'required|integer|unique:ciudadanos,cedula|min:10',
            'nombre_doctor' => 'required|string|min:3',
            'apellido_doctor' => 'required|string|min:3',
            'sexo_doctor' => 'required|string|min:1',
            'fecha_nacimiento_doctor' => 'required|date',
            'email_doctor' => 'required|email|unique:ciudadanos,correo|max:30|min:3',
            'tlf_doctor' => 'required|string|unique:ciudadanos,nro_telefono|min:6',
            'estado_doctor' => 'required',
            'municipio_doctor' => 'required',
            'parroquia_doctor' => 'required',
            'mpps_doctor' => 'required|string|min:3',
            'especialidad_doctor' => 'required',
            'password' => ['required', 'string', $this->passwordRules(),'confirmed']
        ];
    }
}
