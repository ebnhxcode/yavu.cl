<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class ServicioCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
    }
}
