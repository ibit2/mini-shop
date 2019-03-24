<?php

namespace App\Http\Requests\Business;

use App\Http\Requests\BaseRequest;

class GoodsRequest extends BaseRequest
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
                    'id' => 'required|integer|exists:goods'
                ];
                break;
            case 'add':
                return [
                    'name' => 'required|string',
                    'price' => 'required|integer',
                    'salesInitial' => 'sometimes|integer',
                    'salesActual' => 'sometimes|integer',
                    'imgs' => 'required|array',
                    'imgs.*' => 'url',
                    'detail' => 'required',
                    'stockCalcuType' => 'required|in:1,2',
                    'status' => 'required|boolean',
                    'goodsCategoryId' => 'required|integer|exists:goods_categories,id',
                ];
                break;
            case 'update':
                return [
                    'id' => 'required|integer|exists:goods',
                    'price' => 'sometimes|integer',
                    'salesInitial' => 'sometimes|integer',
                    'salesActual' => 'sometimes|integer',
                    'imgs' => 'sometimes|array',
                    'stockCalcuType' => 'sometimes|in:1,2',
                    'status' => 'sometimes|boolean',
                    'goodsCategoryId' => 'sometimes|integer|exists:goods_categories',
                ];
                break;
            case 'delete':
                return [
                    'ids' => 'required|array'
                ];
                break;
            default:
                return [];
        }

    }
}
