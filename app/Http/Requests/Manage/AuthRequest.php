<?php

namespace App\Http\Requests\Manage;


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
                    'username'=>['required'],
                    'pwd'=>'required'
                ];
                break;
            case 'updateMe':
                return [
                    'username'=>['sometimes',Rule::unique('users')->ignore($this->id)]
                ];
                break;

            default:
                return [];
        }
    }
}
