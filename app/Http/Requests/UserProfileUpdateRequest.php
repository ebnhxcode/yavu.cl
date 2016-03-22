<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class UserProfileUpdateRequest extends Request
{
    public function authorize()
    {
        return false;
    }
    public function rules()
    {
        return [
                
        ];
    }
}
