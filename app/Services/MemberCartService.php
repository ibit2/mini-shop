<?php

namespace App\Services;


use App\Models\MemberCart;

class MemberCartService
{
    use BaseService;

    public function __construct()
    {
        $this->modelClass = MemberCart::class;
    }

}