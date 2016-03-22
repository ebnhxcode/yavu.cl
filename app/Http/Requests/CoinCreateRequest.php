<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class CoinCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'user_id' => 'required',
            'motivo'  => 'required',
            'cantidad' => 'required'
        ];
    }
}
