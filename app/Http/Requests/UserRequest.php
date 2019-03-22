<?php

namespace App\Http\Requests;



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
            case 'add':
                return [

                ];
                break;
            case 'detail':
                return [
                    'id'=>'required|integer|exists:users'
                ];
                break;
            case 'update':
                return [
                    'id'=>'required|integer|exists:users'
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
