<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable implements JWTSubject
{
    use BaseModel;
    use BaseModel;
    protected $guarded = [];
    protected $attributes = [
        'avatar' => 'https://iocaffcdn.phphub.org/uploads/avatars/12485_1523190446.jpg!/both/200x200',
    ];
    protected $casts = [
        'is_available' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
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

    protected static function boot()
    {
        self::creating(function ($model) {
            $model->pwd = sha1($model->pwd);
        });
        self::saving(function ($model) {
            if (request()->has('pwd')) {
                $model->pwd = sha1($model->pwd);
            }
        });
    }
}
