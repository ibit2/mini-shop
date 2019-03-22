<?php

namespace App\Services;


use App\Member;

class MemberService
{
    use BaseService;

    public function __construct()
    {
        $this->modelClass = Member::class;
    }

    //禁用和启用
    public function isAvailable($id)
    {
        $model = $this->getOneById($id);
        $model->isAvailable = !($model->isAvailable);
        return $model->save();
    }

    public function getOneByPhone($phone)
    {
        return $this->modelClass::phone($phone)->first();
    }
}