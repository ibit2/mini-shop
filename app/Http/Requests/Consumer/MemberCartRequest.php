<?php

namespace App\Http\Requests\Consumer;



use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class MemberCartRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'add':
                return [
                    'phone'=>['required','regex:/^1[3|4|5|8][0-9]\d{4,8}$/','unique:members']
                ];
                break;
            case 'update':
                return [
                    'id'=>'required|integer|exists:members',
                    'phone'=>['sometimes','regex:/^1[3|4|5|8][0-9]\d{4,8}$/',Rule::unique('members')->ignore($this->id)]
                ];
                break;
            default:
                return [];
        }
    }
}
