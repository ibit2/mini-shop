<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\UserRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Manage\UserCollection;
use App\Http\Resources\Manage\UserResource;
use App\Services\UserService;

class UserController extends BaseController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    //分页列表和全量列表
    public function list(UserRequest $request)
    {
        $limit = 0;
        $rs = [];
        if ($request->has('pageSize')) {
            $limit = $request->input('pageSize');
            $rs['count'] = $this->userService->getCount($request);
        }
        $users = $this->userService->list($request, $limit, [
            'roles'
        ]);
        $rs['users'] = new UserCollection($users);
        return $this->success($rs);
    }

    //详情
    public function detail(UserRequest $request)
    {
        $id = $request->input('id');
        $user = $this->userService->detail($id);
        return $this->success(new UserResource($user));
    }

    //添加
    public function add(UserRequest $request)
    {
        $data = $request->all();
        $this->userService->add($data);
        return $this->success();
    }

    //修改
    public function update(UserRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->userService->update($id, $data);
        return $this->success();
    }

    //单删除和批量删除
    public function delete(UserRequest $request)
    {
        $ids = $request->input('ids');
        $this->userService->delete($ids);
        return $this->success();
    }

    //禁用和启用
    public function isAvailable(UserRequest $request)
    {
        $id = $request->input('id');
        $this->userService->isAvailable($id);
        return $this->success();
    }
}
