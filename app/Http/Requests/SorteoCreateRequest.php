<?php
namespace yavu\Http\Requests;
use Carbon\Carbon;
use yavu\Http\Requests\Request;
class SorteoCreateRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   public function rules()  
   {
      return [
         'nombre_sorteo' => 'required',
         'descripcion' => 'required',
         'fecha_inicio_sorteo' => 'required|date|after:'.Carbon::now()->addDays(4).'|before:'.Carbon::now()->addDays(14),
         'imagen_sorteo' => 'required',
      ];
   }
}
