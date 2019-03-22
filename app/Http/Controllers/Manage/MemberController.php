<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\MemberRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Manage\MemberCollection;
use App\Http\Resources\Manage\MemberResource;
use App\Services\MemberService;

class MemberController extends BaseController
{
    protected $memberService;

    public function __construct()
    {
        $this->memberService = new MemberService();
    }

    //分页列表和全局列表
    public function list(MemberRequest $request)
    {
        $limit = 0;
        $rs = [];
        if ($request->has('pageSize')) {
            $limit = $request->input('pageSize');
            $rs['count'] = $this->memberService->getCount($request);
        }
        $users = $this->memberService->list($request, $limit);
        $rs['members'] = new MemberCollection($users);
        return $this->success($rs);
    }

    //详情
    public function detail(MemberRequest $request)
    {
        $id = $request->input('id');
        $user = $this->memberService->detail($id);
        return $this->success(new MemberResource($user));
    }

    //删除和批量删除
    public function delete(MemberRequest $request)
    {
        $ids = $request->input('ids');
        $this->memberService->delete($ids);
        return $this->success();
    }

    //禁用和启用
    public function isAvailable(MemberRequest $request)
    {
        $id = $request->input('id');
        $this->memberService->isAvailable($id);
        return $this->success();
    }
}
