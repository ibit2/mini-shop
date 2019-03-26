<?php

namespace App\Http\Requests\Consumer;

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
                    'merchantId'=>'required|integer',
                ];
                break;
            case 'detail':
                return [
                    'id' => 'required|integer|exists:goods',
                    'merchantId'=>'required|integer',
                ];
                break;
            default:
                return [];
        }

    }
}
