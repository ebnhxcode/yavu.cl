<?php
namespace yavu\Http\Requests;
use yavu\Http\Requests\Request;
class FeedCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'status' => 'required'
        ];
    }
}
