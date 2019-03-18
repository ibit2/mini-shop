<?php

namespace App;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use BaseModel;
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopeUsername($query, $username)
    {
        return $query->where('username', $username);
    }

    public function getPermissions()
    {
        $roles = $this->roles()->with('permissions')->get();
        $permissions = [];
        $roles->map(function ($role) use (&$permissions) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission;
            }
        });
        return $permissions;

    }




}
