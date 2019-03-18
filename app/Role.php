<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use BaseModel;
    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
