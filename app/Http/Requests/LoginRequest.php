<?php
namespace milahorros\Http\Requests;
use milahorros\Http\Requests\Request;
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
            'password' => 'required'         
        ];
    }
}
