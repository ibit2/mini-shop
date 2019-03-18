<?php

namespace App\Http\Controllers\Manage;

use App\GoodsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class GoodsCategoryController extends BaseController
{

    public function index()
    {
        return $this->success([
            'goodsCategories' => GoodsCategory::get()
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(GoodsCategory $goodsCategory)
    {
        //
    }


    public function update(Request $request, GoodsCategory $goodsCategory)
    {
        //
    }

    public function destroy(GoodsCategory $goodsCategory)
    {
        //
    }
}
