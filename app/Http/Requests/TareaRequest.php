<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $validacion = [
            'nombre' => 'required|min:1|max:255',
            'descripcion' => 'required|min:1|max:1000',
            'user_id' => 'required|numeric',
            'fecha_comprometida' => 'required|date_format:Y-m-d',
        ];
        
        return $validacion;
    }
}
