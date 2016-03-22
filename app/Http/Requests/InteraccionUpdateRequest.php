<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class InteraccionUpdateRequest extends Request
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
