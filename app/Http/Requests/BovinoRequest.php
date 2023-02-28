<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BovinoRequest extends FormRequest
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
        return [
            "id"=>"required",
            "peso"=>"required",
            "leiteProduzido"=>"required",
            "racaoConsumida"=>"required",
            "data_nasc"=>"required"
        ];
    }

    public function messages()
    {
        return [
            "id.required"=>"Preencha o campo ID",
            "peso.required"=>"Preencha o campo PESO",
            "leiteProduzido.required"=>"Preencha o campo LEITE",
            "racaoConsumida.required"=>"Preencha o campo RAÇÃO",
            "data_nasc.required"=>"Preencha o campo DATA DE NASCIMENTO",
        ];
    }
}
