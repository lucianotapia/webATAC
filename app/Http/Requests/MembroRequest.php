<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroRequest extends FormRequest
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
        $rules = [            
            'nusp'   => 'required',
            'membro' => 'required',
            'inicio' => 'required|date_format:d/m/Y',
            'fim'    => 'required|date_format:d/m/Y',
            'colegiado_id' => 'required',
            'vinculo_id'   => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nusp.required'   => 'N. USP não informado',
            'membro.required' => 'Nome do membro não informado',
            'inicio.required' => 'A data inicial não pode ficar em branco.',
            'inicio.numeric'  => 'O valor deve ser numérico.',
            'fim.required'    => 'A data final não pode ficar em branco.',
            'fim.numeric'     => 'O valor deve ser numérico.',
            'colegiado_id.required' => 'Colegiado não informado.',
            'vinculo_id.required'   => 'Vinculo não informado.',

        ];
    }
}
