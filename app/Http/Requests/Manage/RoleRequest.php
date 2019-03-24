<?php

namespace App\Http\Requests\Manage;


use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends BaseRequest
{
    public function rules()
    {
        $method = $this->route()->getActionMethod();
        switch ($method) {
            case 'list':
                return [
                    'pageSize' => 'sometimes|integer',
                    'lastId' => 'required_with:pageSize|integer',
                ];
                break;
            case 'detail':
                return [
                    'id' => 'required|integer|exists:roles'
                ];
                break;
            case 'add':
                return [
                    'name' => ['required', Rule::unique('roles')->where(function ($query) {
                        $query->where('type', 1);
                    })],
                ];
                break;
            case 'update':
                return [
                    'id' => 'required|integer|exists:roles',
                    'name' => ['sometimes', Rule::unique('roles')->where(function ($query) {
                        $query->where('type', 1);
                    })->ignore($this->id)],
                ];
                break;
            case 'delete':
                return [
                    'id' => ['required','integer',Rule::exists('roles')->where(function ($query) {
                        $query->where('type', 1);
                    })],
                ];
                break;
            default:
                return [];
        }
    }
}
