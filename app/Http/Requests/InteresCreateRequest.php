<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class InteresCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nombre_interes' => 'required',
            'descripcion_interes' => 'required'
        ];
    }
}
