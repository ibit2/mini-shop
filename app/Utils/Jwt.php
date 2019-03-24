<?php

namespace App\Utils;

use App\Exceptions\MessageException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Jwt
{
    public function generateToken($guard, $user,$ttl=7200, $custom = [])
    {
        return auth($guard)->setTTL($ttl)->claims($custom)->fromUser($user);
    }

    public function parsePayload($guard)
    {
        try {
            $jwt = auth($guard)->parseToken();
            if (empty($jwt->getToken())) {
                throw new MessageException('token不可用');
            }
            $payload = $jwt->check(true);
            if ($payload == false) {
                throw new MessageException('token不可用');
            }
            return $payload->toArray();
        } catch (\Exception $exception) {
            throw new MessageException('token未设置或无法解析');
        }

    }

    public function invalidate($guard)
    {
        try {
            $jwt = auth($guard)->parseToken();
            if (empty($token = $jwt->getToken())) {
                throw new MessageException('token不可用');
            }
            $payload = $jwt->check(true);
            if ($payload == false) {
                throw new MessageException('token不可用');
            }
            auth($guard)->manager()->invalidate($token, false);
        } catch (\Exception $exception) {
            throw new MessageException('token未设置或无法解析');
        }

    }

    public function refreshToken($request)
    {
        return JWTAuth::setRequest($request)->parseToken()->refresh();
    }


}