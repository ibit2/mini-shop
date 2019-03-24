<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Requests\Consumer\AuthRequest;
use App\Services\MemberService;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Consumer\MemberResource;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:consumer', ['except' => ['pwdLogin', 'smsLogin']]);
    }

    //密码登录
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
        $token = $this->generateToken('consumer', $member);
        return $this->success([
            'token' => $token,
        ]);
    }

    //短信登录
    public function smsLogin(AuthRequest $request)
    {
        $phone = $request->input('phone');
        $code = $request->input('code');
        //todo 验证码

        $memberService = new MemberService();
        $member = $memberService->getOneByPhone($phone);
        if (empty($member)) {
            //自动注册
            $data = [
                'phone' => $phone,
                'pwd' => sha1(123456),
            ];
            $memberService->add($data);
            $member = $memberService->getOneByPhone($phone);
        }
        $token = $this->generateToken('consumer', $member);
        return $this->success([
            'token' => $token,
        ]);
    }

    //个人信息
    public function me()
    {
        $payload = $this->parsePayload('consumer');
        $id = $payload['sub'];
        $memberService = new MemberService();
        $member = $memberService->detail($id);
        return $this->success(new MemberResource($member));
    }

    //更新个人信息
    public function updateMe(AuthRequest $request)
    {
        $memberService = new MemberService();
        $payload = $this->parsePayload('consumer');
        $id = $payload['sub'];
        $data = $request->only(['phone','avatar','nickname']);
        $memberService->update($id, $data);
        return $this->success();
    }
    //注销
    public function logout()
    {
        $this->invalidate('manage');
        return $this->success();
    }

}
