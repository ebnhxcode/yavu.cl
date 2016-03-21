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
         'banner_empresa' => 'required',
         'enlace_empresa' => 'required|unique:banners',
         'imagen_empresa' => 'required',
         'comentario_banner' => 'required',
         //'password' => 'required'
      ];
   }
}


