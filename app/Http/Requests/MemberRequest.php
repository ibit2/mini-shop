<?php

namespace App\Http\Requests;



use Illuminate\Validation\Rule;

class MemberRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'list':
                return [
                    'pageSize'=>'sometimes|integer',
                    'lastId'=>'required_with:pageSize|integer',
                ];
                break;
            case 'detail':
                return [
                    'id'=>'required|integer|exists:members'
                ];
                break;
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
            case 'delete':
                return [
                    'ids'=>'required|array'
                ];
                break;
            case 'isAvailable':
                return [
                    'id'=>'required|integer|exists:members'
                ];
                break;

            default:
                return [];
        }
    }
}
