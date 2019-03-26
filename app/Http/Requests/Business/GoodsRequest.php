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
                    'salesInitial' => 'sometimes|integer',
                    'salesActual' => 'sometimes|integer',
                    'imgs' => 'required|array',
                    'imgs.*' => 'url',
                    'detail' => 'required',
                    'stockCalcuType' => 'required|in:1,2',
                    'isMultipleSpec' => 'required|boolean',
                    'goodsSpecs' => 'required_if:isMultipleSpec,1|array',
                    'goodsSpecs.*.name' => 'required',
                    'goodsSpecs.*.value' => 'required|array',
                    'goodsSkus' => 'required_if:isMultipleSpec,1|array',
                    'goodsSkus.*.salePrice' => 'required_if:isMultipleSpec,1|numeric',
                    'goodsSkus.*.linePrice' => 'required_if:isMultipleSpec,1|sometimes|numeric',
                    'goodsSkus.*.stockNum' => 'required_if:isMultipleSpec,1|integer',
                    'goodsSkus.*.isDefault' => 'required_if:isMultipleSpec,1|boolean',
                    'salePrice' => 'required_if:isMultipleSpec,0|numeric',
                    'stockNum' => 'required_if:isMultipleSpec,0|integer',
                    'status' => 'required|boolean',
                    'goodsCategoryId' => 'required|integer|exists:goods_categories,id',
                ];
                break;
            case 'update':
                return [
                    'id' => 'required|integer|exists:goods',
                    'salePrice' => 'sometimes|numeric',
                    'salesInitial' => 'sometimes|integer',
                    'salesActual' => 'sometimes|integer',
                    'imgs' => 'sometimes|array',
                    'imgs.*' => 'url',
                    'stockCalcuType' => 'sometimes|in:1,2',
                    'stockNum' => 'sometimes|integer',
                    'isMultipleSpec' => 'sometimes|boolean',
                    'status' => 'sometimes|boolean',
                    'goodsCategoryId' => 'sometimes|integer|exists:goods_categories,id',
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
