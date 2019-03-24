<?php

namespace App\Services;


use App\Models\GoodsCategory;
use Illuminate\Http\Request;

class GoodsCategoryService
{
    use BaseService;
    public function __construct()
    {
        $this->modelClass = GoodsCategory::class;
    }
    public function treeList(Request $request)
    {
        $models = $this->getMany($request);
        $models = getTree($models, 'id', 'pid');
        return $models;
    }

}