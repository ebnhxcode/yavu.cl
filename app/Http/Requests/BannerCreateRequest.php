<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class BannerCreateRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   public function rules()  
   {
      return [
         'titulo_banner' => 'required',
         'enlace_empresa' => 'required|unique:banners',
         'imagen_banner' => 'required',
         'comentario_banner' => 'required',
         //'password' => 'required'
      ];
   }
}


