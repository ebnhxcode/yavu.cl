<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class SorteoUpdateRequest extends Request
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
            'fecha_inicio_sorteo' => 'required',   
            'estado_sorteo' => 'required',
            ];
        }
}
