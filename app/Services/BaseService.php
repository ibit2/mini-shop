<?php

namespace App\Services;

use Illuminate\Http\Request;

trait BaseService
{
    protected $modelClass;

    //分页列表和全局列表
    public function list(Request $request, $limit = 0, $with = [])
    {
        $models = $this->getMany($request, $limit, $with);
        return $models;
    }

    //详情
    public function detail($id,$with=[])
    {
        return $this->getOneById($id,$with);
    }

    //添加
    public function add($data)
    {
        return $this->modelClass::create($data);
    }

    //修改
    public function update($id, $data)
    {
        $model = $this->getOneById($id);
        return $model->update($data);

    }

    //删除和批量删除
    public function delete($ids)
    {
        return $this->modelClass::destroy($ids);

    }

    //获取条数
    public function getCount(Request $request)
    {
        return $this->modelClass::filter($request->all())->count();
    }

    protected function getOneById($id,$with=[])
    {
        return $this->modelClass::with($with)->find($id);
    }

    protected function getMany(Request $request, $limit = 0, $with = [])
    {
        $query = $this->modelClass::filter($request->all())->with($with);
        if ($limit) {
            $query->limit($limit);
        }
        return $query->orderBy('id', 'desc')->get();
    }

}