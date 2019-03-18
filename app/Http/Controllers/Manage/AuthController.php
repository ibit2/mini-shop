<?php

namespace App\Http\Controllers\Manage;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    public function pwdLogin(Request $request)
    {
        $username = $request->input('username');
        $pwd = $request->input('pwd');
        $user = User::username($username)->first();
        if (empty($user)) {
            return $this->fail('用户不存在');
        }
        if ($user->pwd != $pwd) {
            return $this->fail('密码错误');
        }
        $permissions = $user->getPermissions();
        $token = auth('manage')->login($user);
        return $this->success([
            'permissions' => $permissions,
            'token' => $token,
        ]);
    }
}
