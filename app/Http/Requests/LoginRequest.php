<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class LoginRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            '_token' => 'required'
        ];
    }
}
