<?php

namespace App\Services;


use App\Models\User;

class UserService
{
    use BaseService;

    public function __construct()
    {
        $this->modelClass = User::class;
    }

    //禁用和启用
    public function isAvailable($id)
    {
        $model = $this->getOneById($id);
        $model->isAvailable = !($model->isAvailable);
        return $model->save();
    }

    public function getOneByUsername($username)
    {
        return $this->modelClass::username($username)->first();
    }


}