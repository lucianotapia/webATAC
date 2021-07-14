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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [            
            'data' => 'required|date_format:d/m/Y'            
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'data.required'    => 'A data não pode ficar em branco.',
            'data.numeric'    => 'O valor deve ser numérico.',
        ];
    }
}
