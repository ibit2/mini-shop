<?php

namespace App\Http\Requests\Manage;



use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
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
                    'id'=>'required|integer|exists:users'
                ];
                break;
            case 'add':
                return [
                    'username'=>'required|min:5|unique:users',
                    'pwd'=>'required',
                    'nickname'=>'required',
                ];
                break;
            case 'update':
                return [
                    'id'=>'required|integer|exists:users',
                    'username'=>['sometimes',Rule::unique('users')->ignore($this->id)],
                ];
                break;
            case 'delete':
                return [
                    'ids'=>'required|array'
                ];
                break;
            case 'isAvailable':
                return [
                    'id'=>'required|integer|exists:users'
                ];
                break;
            default:
                return [];
        }
    }
}
