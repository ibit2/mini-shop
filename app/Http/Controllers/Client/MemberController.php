<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\MemberRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Client\MemberResource;
use App\Services\MemberService;

class MemberController extends BaseController
{
    protected $memberService;

    public function __construct()
    {
        $this->memberService = new MemberService();
    }

    //详情
    public function detail(MemberRequest $request)
    {
        $id = $request->input('id');
        $user = $this->memberService->detail($id);
        return $this->success(new MemberResource($user));
    }

    //添加
    public function add(MemberRequest $request)
    {
        $data = $request->all();
        $this->memberService->add($data);
        return $this->success();
    }

    //修改
    public function update(MemberRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->memberService->update($id, $data);
        return $this->success();
    }


}
