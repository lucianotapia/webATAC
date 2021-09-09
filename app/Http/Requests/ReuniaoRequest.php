<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReuniaoRequest extends FormRequest
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
            'titulo' => 'required',
            'data'   => 'required|date_format:d/m/Y',
            'colegiado_id' => 'required',
            "pauta"  => 'mimes:pdf'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Título da reunião não informado',
            'data.required'   => 'A data não pode ficar em branco.',
            'data.numeric'    => 'O valor deve ser numérico.',
            'colegiado_id.required' => 'Colegiado não informado.',
            'pauta.mimes'  => 'O arquivo de pauta deve ser no formato PDF'
        ];
    }
}