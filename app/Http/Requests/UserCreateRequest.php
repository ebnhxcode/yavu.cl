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
         'nombre' => 'required',
         'apellido' => 'required',
         'password' => 'required',
         'ciudad' => 'required'
      ];
   }
}
