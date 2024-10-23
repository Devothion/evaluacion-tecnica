<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class GenerateTokenRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('personal_access_tokens', 'name')->where(function ($query) {
                    return $query->where('tokenable_id', Auth::id())
                                 ->where('tokenable_type', 'App\\Models\\User');
                }),
            ],
        ];
    }

    /**
     * Mensajes personalizados de error.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre.unique' => 'Ya has creado un token con este nombre. Elige otro.',
        ];
    }

    /**
     * Devuelve los errores con un *validation bag* específico.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw (new \Illuminate\Validation\ValidationException($validator))
            ->errorBag('tokenCreation');
    }
}
