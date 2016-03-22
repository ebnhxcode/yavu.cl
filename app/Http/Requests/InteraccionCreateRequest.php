<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class InteraccionCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nombre_interaccion' => 'required',
            'descripcion_interaccion' => 'required'
        ];
    }
}
