<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\RoleRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Manage\RoleCollection;
use App\Http\Resources\Manage\RoleResource;
use App\Services\RoleService;

class RoleController extends BaseController
{
    protected $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    //分页列表和全局列表
    public function list(RoleRequest $request)
    {
        $limit = 0;
        $rs = [];
        if ($request->has('pageSize')) {
            $limit = $request->input('pageSize');
            $rs['count'] = $this->roleService->getCount($request);
        }
        $request->merge(['type'=>1]);
        $users = $this->roleService->list($request, $limit);
        $rs['roles'] = new RoleCollection($users);
        return $this->success($rs);
    }

    //详情
    public function detail(RoleRequest $request)
    {
        $id = $request->input('id');
        $user = $this->roleService->detail($id,['permissions']);
        return $this->success(new RoleResource($user));
    }

    //添加
    public function add(RoleRequest $request)
    {
        $data = $request->all();
        $data['type'] = 1;
        $this->roleService->add($data);
        return $this->success();
    }

    //修改
    public function update(RoleRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $data['type'] = 1;
        $this->roleService->update($id, $data);
        return $this->success();
    }

    //单删除
    public function delete(RoleRequest $request)
    {
        $id = $request->input('id');
        $this->roleService->delete($id);
        return $this->success();
    }

}
