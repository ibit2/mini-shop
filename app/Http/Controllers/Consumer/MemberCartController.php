<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Requests\Consumer\MemberCartRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Consumer\MemberCartCollection;
use App\Http\Resources\Consumer\MemberCartResource;
use App\Services\MemberCartService;

class MemberCartController extends BaseController
{
    protected $memberCartService;
    protected $payload;

    public function __construct()
    {
        $this->memberCartService = new MemberCartService();
        $this->payload = $this->parsePayload('consumer');
    }

    //全量列表
    public function list(MemberCartRequest $request)
    {
        $rs = [];
        $request->merge(['memberId' => $this->payload['sub']]);
        $memberCarts = $this->memberCartService->list($request);
        $rs['memberCarts'] = new MemberCartCollection($memberCarts);
        return $this->success($rs);
    }



    //添加
    public function add(MemberCartRequest $request)
    {
        $data = $request->all();
        $this->memberCartService->add($data);
        return $this->success();
    }

    //修改
    public function update(MemberCartRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->memberCartService->update($id, $data);
        return $this->success();
    }

    //单删除
    public function delete(MemberCartRequest $request)
    {
        $id = $request->input('id');
        $this->memberCartService->delete($id);
        return $this->success();
    }
}
