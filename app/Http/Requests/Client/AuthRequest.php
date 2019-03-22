<?php

namespace App\Http\Requests\Client;


use App\Http\Requests\BaseRequest;

class AuthRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'pwdLogin':
                return [
                    'phone'=>['required','regex:/^1[3|4|5|8][0-9]\d{4,8}$/'],
                    'pwd'=>'required'
                ];
                break;

            default:
                return [];
        }
    }
}
