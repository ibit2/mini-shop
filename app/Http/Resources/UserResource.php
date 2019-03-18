<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
           'id'=>$this->id,
           'username'=>$this->username,
           'nickname'=>$this->nickname,
           'roles'=>new RoleCollection($this->roles),
           'createdAt'=>$this->createdAt,
       ];
    }
}
