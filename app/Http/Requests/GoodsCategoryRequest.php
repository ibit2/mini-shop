<?php

namespace App\Http\Requests;


class GoodsCategoryRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'add':
                return [
                    'pid'=>'required|integer',
                    'name'=>'required|string',
                    'icon'=>'sometimes|url',
                    'order'=>'sometimes|integer',
                ];
                break;
            case 'detail':
                return [
                    'id'=>'required|integer|exists:goods_categories'
                ];
                break;
            case 'update':
                return [
                    'id'=>'required|integer|exists:goods_categories'
                ];
                break;
            case 'delete':
                return [
                    'ids'=>'required|array'
                ];
                break;

            default:
                return [];
        }

    }
}
