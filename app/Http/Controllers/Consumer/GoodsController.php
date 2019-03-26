<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Requests\Consumer\GoodsRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Consumer\GoodsCollection;
use App\Http\Resources\Consumer\GoodsResource;
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
        $goods = $this->goodsService->list($request,$limit,['goodsSkus','goodsSpecs.goodsSpecValues']);
        $rs['goods'] = new GoodsCollection($goods);
        return $this->success($rs);
    }


    //详情
    public function detail(GoodsRequest $request)
    {
        $id = $request->input('id');
        $user = $this->goodsService->detail($id,['goodsSkus','goodsSpecs.goodsSpecValues']);
        return $this->success(new GoodsResource($user));
    }

}
