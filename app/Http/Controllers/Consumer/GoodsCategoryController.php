<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Requests\Consumer\GoodsCategoryRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Consumer\GoodsCategoryCollection;
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


}
