<?php

namespace App\Http\Controllers\Business;

use App\Http\Requests\Business\AuthRequest;
use App\Services\MerchantService;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Business\MerchantResource;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:business', ['except' => ['pwdLogin', 'smsLogin']]);
    }

    //密码登录
    public function pwdLogin(AuthRequest $request)
    {
        $phone = $request->input('phone');
        $pwd = $request->input('pwd');
        $merchantService = new MerchantService();
        $merchant = $merchantService->getOneByPhone($phone);
        if (empty($merchant)) {
            return $this->fail('用户不存在');
        }
        if ($merchant->pwd != $pwd) {
            return $this->fail('密码错误');
        }
        $token = $this->generateToken('business', $merchant);
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

        $merchantService = new MerchantService();
        $merchant = $merchantService->getOneByPhone($phone);
        if (empty($merchant)) {
            //自动注册
            $data = [
                'phone' => $phone,
                'pwd' => sha1(123456),
                'status' => 1,
            ];
            $merchantService->add($data);
            $merchant = $merchantService->getOneByPhone($phone);
        }
        $token = $this->generateToken('business', $merchant);
        return $this->success([
            'token' => $token,
        ]);
    }

    //个人信息
    public function me()
    {
        $payload = $this->parsePayload('business');
        $id = $payload['sub'];
        $merchantService = new MerchantService();
        $merchant = $merchantService->detail($id);
        return $this->success(new MerchantResource($merchant));
    }
    //更新个人信息
    public function updateMe(AuthRequest $request)
    {
        $merchantService = new MerchantService();
        $payload = $this->parsePayload('business');
        $id = $payload['sub'];
        $data = $request->only(['phone','avatar']);
        $merchantService->update($id, $data);
        return $this->success();
    }
    //注销
    public function logout()
    {
        $this->invalidate('business');
        return $this->success();
    }

}
