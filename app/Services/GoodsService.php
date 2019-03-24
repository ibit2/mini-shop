<?php

namespace App\Services;


use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsService
{
    use BaseService;
    public function __construct()
    {
        $this->modelClass = Goods::class;
    }
    public function treeList(Request $request)
    {
        $models = $this->getMany($request);
        $models = getTree($models, 'id', 'pid');
        return $models;
    }
    public function delete($id)
    {
        //todo 是否被使用
        return $this->modelClass::destroy([$id]);

    }

}