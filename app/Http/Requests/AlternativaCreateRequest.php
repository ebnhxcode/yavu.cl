<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class AlternativaCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'encuesta_id' => 'required',
            'pregunta_id' => 'required',
            'alternativa' => 'required',
        ];
    }
}
