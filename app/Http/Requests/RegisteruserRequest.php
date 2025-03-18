<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class RegisteruserRequest extends FormRequest
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
            'password' => ['required', 'string', $this->passwordRules(),'confirmed'],
            'nombre_paciente' => ['required', 'string', 'min:3'],
            'sexo_paciente' => ['required','string'],
            'apellido_paciente' => ['required', 'string', 'min:3'],
            'fecha_nacimiento_paciente' => ['required', 'date'],
            'email_paciente' => ['required','email','unique:ciudadanos,correo', 'min:3'],
            'tlf_paciente' => ['required', 'string', 'unique:ciudadanos,nro_telefono', 'min:3'],
            'estado_paciente' => ['required'],
            'municipio_paciente' => ['required'],
            'parroquia_paciente' => ['required'],
        ];
    }
}
