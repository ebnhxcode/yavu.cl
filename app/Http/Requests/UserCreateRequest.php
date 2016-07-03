<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class UserCreateRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   public function rules()
   {
      return [
        'email' => 'required|unique:users',
        'login' => 'required|unique:users',
        'nombre' => 'required',
        'apellido' => 'required',
        'password' => 'required',
        'ciudad' => 'required',
        'fono' => 'required',
        'fecha_nacimiento' => 'required',

      ];
   }
}
