<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class RoleCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];
    }
}
