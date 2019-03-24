<?php

namespace App\Http\Requests\Manage;


use App\Http\Requests\BaseRequest;

class PermissionRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            default:
                return [];
        }
    }
}
