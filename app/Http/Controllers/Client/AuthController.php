<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\AuthRequest;
use App\Services\MemberService;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    public function pwdLogin(AuthRequest $request)
    {
        $phone = $request->input('phone');
        $pwd = $request->input('pwd');
        $memberService = new MemberService();
        $member = $memberService->getOneByPhone($phone);
        if (empty($member)) {
            return $this->fail('用户不存在');
        }
        if ($member->pwd != $pwd) {
            return $this->fail('密码错误');
        }
        $token = auth('client')->login($member);
        return $this->success([
            'token' => $token,
        ]);
    }
}
