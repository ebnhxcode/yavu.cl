<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class UserUpdateRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   public function rules()
   {
      return [
         'rut' => 'required',
         //'email' => 'required',
         //'login' => 'required',
         'nombre' => 'required',
         'apellido' => 'required',
         'ciudad' => 'required',
         
      ];
   }
}
