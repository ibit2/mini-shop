<?php

namespace App\Http\Controllers\Business;

use App\Http\Requests\Business\GoodsCategoryRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Business\GoodsCategoryCollection;
use App\Http\Resources\Business\GoodsCategoryResource;
use App\Services\GoodsCategoryService;

class GoodsCategoryController extends BaseController
{
    protected $goodsCategoryService;

    public function __construct()
    {

        $this->goodsCategoryService = new GoodsCategoryService();
    }

    //全量列表
    public function list(GoodsCategoryRequest $request)
    {
        $rs = [];
        $goodsCategories = $this->goodsCategoryService->list($request);
        $rs['goodsCategories'] = new GoodsCategoryCollection($goodsCategories);
        return $this->success($rs);
    }

    //树型列表
    public function treeList(GoodsCategoryRequest $request)
    {
        $rs = [];
        $goodsCategories = $this->goodsCategoryService->treeList($request);
        $rs['goodsCategories'] = $goodsCategories;
        return $this->success($rs);
    }

    //详情
    public function detail(GoodsCategoryRequest $request)
    {
        $id = $request->input('id');
        $user = $this->goodsCategoryService->detail($id);
        return $this->success(new GoodsCategoryResource($user));
    }

    //添加
    public function add(GoodsCategoryRequest $request)
    {
        $data = $request->all();
        $this->goodsCategoryService->add($data);
        return $this->success();
    }

    //修改
    public function update(GoodsCategoryRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->goodsCategoryService->update($id, $data);
        return $this->success();
    }

    //单删除
    public function delete(GoodsCategoryRequest $request)
    {
        $id = $request->input('id');
        $this->goodsCategoryService->delete($id);
        return $this->success();
    }
}
