<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class EncuestaCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nombre' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required'
        ];
    }
}
