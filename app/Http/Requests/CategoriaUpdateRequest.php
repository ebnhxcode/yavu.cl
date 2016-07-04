<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class CategoriaUpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'category' => 'required',
            'description' => 'required'
           
        ];
    }
}



