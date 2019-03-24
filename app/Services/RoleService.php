<?php

namespace App\Services;


use App\Models\Role;

class RoleService
{
    use BaseService;

    public function __construct()
    {
        $this->modelClass = Role::class;
    }

    public function delete($id)
    {
        $role = $this->getOneById($id);
        if ($role) {
            $role->permissions()->detach();
        }
        return $this->modelClass::destroy([$id]);

    }


}