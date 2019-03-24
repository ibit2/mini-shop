<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\MerchantRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Manage\MerchantCollection;
use App\Http\Resources\Manage\MerchantResource;
use App\Services\MerchantService;
/*
 * 商户
 */
class MerchantController extends BaseController
{
    protected $merchantService;

    public function __construct()
    {
        $this->merchantService = new MerchantService();
    }

    //分页列表
    public function list(MerchantRequest $request)
    {

        $rs = [];
        $limit = $request->input('pageSize');
        $rs['count'] = $this->merchantService->getCount($request);
        $merchants = $this->merchantService->list($request, $limit);
        $rs['merchants'] = new MerchantCollection($merchants);
        return $this->success($rs);
    }

    //详情
    public function detail(MerchantRequest $request)
    {
        $id = $request->input('id');
        $user = $this->merchantService->detail($id);
        return $this->success(new MerchantResource($user));
    }

    //添加
    public function add(MerchantRequest $request)
    {
        $data = $request->all();
        $this->merchantService->add($data);
        return $this->success();
    }

    //修改
    public function update(MerchantRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->merchantService->update($id, $data);
        return $this->success();
    }

    //单删除和批量删除
    public function delete(MerchantRequest $request)
    {
        $ids = $request->input('ids');
        $this->merchantService->delete($ids);
        return $this->success();
    }

    //禁用和启用
    public function isAvailable(MerchantRequest $request)
    {
        $id = $request->input('id');
        $this->merchantService->isAvailable($id);
        return $this->success();
    }
}
