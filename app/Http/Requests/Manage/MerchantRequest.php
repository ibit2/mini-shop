<?php

namespace App\Http\Requests\Manage;



use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class MerchantRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'list':
                return [
                    'pageSize'=>'required|integer|max:100',
                    'lastId'=>'required|integer',
                ];
                break;
            case 'detail':
                return [
                    'id'=>'required|integer|exists:merchants'
                ];
                break;
            case 'add':
                return [
                    'phone'=>['required','regex:/^1[3|4|5|8][0-9]\d{4,8}$/','unique:merchants'],
                    'pwd'=>'required',
                    'name'=>'required',
                    'status'=>'required|integer|in:1,2,3',
                ];
                break;
            case 'update':
                return [
                    'id'=>'required|integer|exists:merchants',
                    'phone'=>['sometimes','regex:/^1[3|4|5|8][0-9]\d{4,8}$/',Rule::unique('merchants')->ignore($this->id)],
                    'status'=>'sometimes|integer|in:1,2,3',
                ];
                break;
            case 'delete':
                return [
                    'ids'=>'required|array'
                ];
                break;
            case 'isAvailable':
                return [
                    'id'=>'required|integer|exists:merchants'
                ];
                break;
            default:
                return [];
        }
    }
}
