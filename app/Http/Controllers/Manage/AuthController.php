<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\AuthRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Manage\UserResource;
use App\Services\UserService;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:manage', ['except' => ['pwdLogin']]);
    }

    //密码登录
    public function pwdLogin(AuthRequest $request)
    {
        $username = $request->input('username');
        $pwd = $request->input('pwd');
        $userService = new UserService();
        $user = $userService->getOneByUsername($username);
        if (empty($user)) {
            return $this->fail('用户不存在');
        }
        if ($user->pwd != $pwd) {
            return $this->fail('密码错误');
        }
        $token = $this->generateToken('manage', $user);
        return $this->success([
            'token' => $token,
        ]);
    }

    //个人信息
    public function me()
    {
        $payload = $this->parsePayload('manage');
        $id = $payload['sub'];
        $userService = new UserService();
        $user = $userService->detail($id);
        return $this->success(new UserResource($user));
    }

    //更新个人信息
    public function updateMe(AuthRequest $request)
    {
        $userService = new UserService();
        $payload = $this->parsePayload('manage');
        $id = $payload['sub'];
        $data = $request->all();
        $userService->update($id, $data);
        return $this->success();
    }
    //注销
    public function logout()
    {
        $this->invalidate('manage');
        return $this->success();
    }

}
