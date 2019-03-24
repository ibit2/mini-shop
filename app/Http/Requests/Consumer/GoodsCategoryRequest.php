<?php

namespace App\Http\Requests\Consumer;

use App\Http\Requests\BaseRequest;


class GoodsCategoryRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'list':
                return [
                    'merchantId' => ['required','integer']
                ];
                break;
            case 'treeList':
                return [
                    'merchantId' => ['required','integer']
                ];
                break;
            default:
                return [];
        }

    }
}
