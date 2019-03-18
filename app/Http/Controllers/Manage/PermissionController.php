<?php

namespace App\Http\Controllers\Manage;

use App\Http\Resources\PermissionCollection;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class PermissionController extends BaseController
{

    public function index()
    {
        return $this->success(new PermissionCollection(Permission::get()));
    }

}
