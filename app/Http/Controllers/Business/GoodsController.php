<?php

namespace App\Http\Controllers\Business;

use App\Http\Requests\Business\GoodsRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Business\GoodsCollection;
use App\Http\Resources\Business\GoodsResource;
use App\Services\GoodsService;

class GoodsController extends BaseController
{
    protected $goodsService;

    public function __construct()
    {
        $this->goodsService = new GoodsService();
    }

    //分页列表
    public function list(GoodsRequest $request)
    {

        $rs = [];
        $limit = $request->input('pageSize');
        $rs['count'] = $this->goodsService->getCount($request);
        $goods = $this->goodsService->list($request,$limit,['goodsCategory']);
        $rs['goods'] = new GoodsCollection($goods);
        return $this->success($rs);
    }


    //详情
    public function detail(GoodsRequest $request)
    {
        $id = $request->input('id');
        $user = $this->goodsService->detail($id,['goodsCategory']);
        return $this->success(new GoodsResource($user));
    }

    //添加
    public function add(GoodsRequest $request)
    {
        $data = $request->all();
        $this->goodsService->add($data);
        return $this->success();
    }

    //修改
    public function update(GoodsRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->goodsService->update($id, $data);
        return $this->success();
    }

    //单删除
    public function delete(GoodsRequest $request)
    {
        $id = $request->input('id');
        $this->goodsService->delete($id);
        return $this->success();
    }
}
