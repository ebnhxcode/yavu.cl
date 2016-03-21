<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class BannerUpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'banner_empresa' => 'required',
            'enlace_empresa' => 'required',
            'imagen_empresa' => 'required',
            'comentario_banner' => 'required'           
        ];
    }
}



