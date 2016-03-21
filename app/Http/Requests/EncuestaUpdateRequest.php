<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class EncuestaUpdateRequest extends Request
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
