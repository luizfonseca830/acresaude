<?php

namespace App\Http\Requests\Servico;

use Illuminate\Foundation\Http\FormRequest;

class SolicitacaoRequest extends FormRequest
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
            //
            'especialidade_id' => 'required|exists:especialidades,id',
            'file_conf_med' => 'mimetypes:application/pdf|max:3000',
            'file_conf_esp' => 'mimetypes:application/pdf|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'especialidade_id.required' => "O campo especialidade é obrigatório.",
            'especialidade_id.exists' => "O campo especialidade não existe em nosso banco.",
            'file_conf_med.mimetypes' => "O campo documento confirmação de mediciona ou consultória só aceita arquivo do tipo pdf.",
            'file_conf_med.max' => "O campo documento confirmação de mediciona ou consultória tem tamanho máximo de 3mb.",
            'file_conf_esp.mimetypes' => "O campo documento confirmação de especialidade tem tamanho máximo de 3mb.",

        ]; // TODO: Change the autogenerated stub
    }
}