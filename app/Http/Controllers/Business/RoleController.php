<?php

namespace App\Http\Controllers\Business;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class RoleController extends BaseController
{

    public function index(Request $request)
    {
        return $this->success([
            'roles' => new RoleCollection(Role::with([
                'permissions',
                'users',
            ])->get())
        ]);
    }


    public function store(RoleRequest $request)
    {
        return $this->success(new RoleResource(Role::create($request->all())));
    }


    public function show(Role $role)
    {
        return $this->success(new RoleResource($role));
    }


    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return $this->success(new RoleResource($role));
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return $this->success($role);
    }
}
