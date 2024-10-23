<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTareaRequest extends FormRequest
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
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'nullable|date',
            'estado' => 'nullable|in:pendiente,en_progreso,completada',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.max' => 'El título debe tener un tamaño máximo de 255 caracteres.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha.',
            'estado.in' => 'El estado debe ser uno de los valores permitidos: pendiente, en_progreso, completada.',
        ];
    }

}
