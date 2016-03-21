<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class PagoUpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
	    	'user_id' => 'required',
	    	'descripcion' => 'required',
	    	'monto' => 'required'            
        ];
    }
}
