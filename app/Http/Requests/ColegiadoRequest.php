<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColegiadoRequest extends FormRequest
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
            'colegiado' => 'required|unique:Colegiado,Colegiado,' . $this->CodColegiado . ',codcolegiado'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'colegiado.required'    => 'Informe a descrição do Colegiado/Comissão',
            'colegiado.unique'      => 'Colegiado/Comissão já cadastrado'
        ];
    }
}
