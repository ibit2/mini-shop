<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable implements JWTSubject
{
    use BaseModel;
    use BaseModel;
    protected $guarded = [];
    protected $attributes = [
        'avatar' => 'https://iocaffcdn.phphub.org/uploads/avatars/12485_1523190446.jpg!/both/200x200',
        'nickname' => '我叫MT',
    ];
    protected $casts = [
        'is_available' => 'boolean'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopePhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }
}
