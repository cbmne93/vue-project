<?php

namespace App\Http\Requests\Empleado;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
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
            

            'cedula' => 'required|min:2|unique:empleados,cedula,'.$this->route('empleado')->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'date' => 'required',
            'cargo_id' => 'required',
            'genero_id' => 'required',
        ];
    }
}
