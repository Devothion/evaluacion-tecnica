<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTareaRequest extends FormRequest
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
            'user_id' => 'required', // Campo obligatorio
            'dni' => 'required|string|size:8', // Campo obligatorio, string de 8 caracteres
            'titulo' => 'required|string|max:255', // Obligatorio, string, máximo 255 caracteres
            'descripcion' => 'nullable|string', // Opcional, string
            'fecha_vencimiento' => 'required|date', // Obligatorio, formato de fecha
            'estado' => 'required|in:pendiente,en_progreso,completada', // Obligatorio, valores permitidos
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.unique' => 'Ya has creado un token con este nombre. Elige otro.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.size' => 'El DNI debe tener 8 caracteres.',
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título debe tener un tamaño máximo de 255 caracteres.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha.',
            'estado.in' => 'El estado debe ser uno de los valores permitidos: pendiente, en_progreso, completada.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }

}
