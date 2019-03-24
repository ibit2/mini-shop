<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\PermissionRequest;
use App\Http\Controllers\BaseController;
use App\Services\PermissionService;

class PermissionController extends BaseController
{
    protected $permissionService;

    public function __construct()
    {
        $this->permissionService = new PermissionService();
    }

    //树型列表
    public function treeList(PermissionRequest $request)
    {
        $rs = [];
        $request->merge(['type'=>1]);
        $permissions = $this->permissionService->treeList($request);
        $rs['permissions'] =$permissions;
        return $this->success($rs);
    }


}
