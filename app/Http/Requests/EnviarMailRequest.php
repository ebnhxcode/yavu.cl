<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class EnviarMailRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'mensaje' => 'required'
        ];
    }
}
