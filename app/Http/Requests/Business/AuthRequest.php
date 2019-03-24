<?php

namespace App\Http\Requests\Business;


use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

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
            case 'smsLogin':
                return [
                    'phone'=>['required','regex:/^1[3|4|5|8][0-9]\d{4,8}$/'],
                    'code'=>'required'
                ];
                break;
            case 'updateMe':
                return [
                    'phone'=>['sometimes','regex:/^1[3|4|5|8][0-9]\d{4,8}$/',Rule::unique('merchants')->ignore($this->id)]
                ];
                break;

            default:
                return [];
        }
    }
}
