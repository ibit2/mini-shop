<?php

namespace App\Services;


use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionService
{
    use BaseService;

    public function __construct()
    {
        $this->modelClass = Permission::class;
    }

    public function treeList(Request $request)
    {
        $models = $this->getMany($request);
        $models = getTree($models, 'id', 'pid');
        return $models;
    }


}