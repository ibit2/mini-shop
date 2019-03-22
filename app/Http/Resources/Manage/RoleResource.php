<?php

namespace App\Http\Resources\Manage;

use Illuminate\Http\Resources\Json\Resource;

class RoleResource extends Resource
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
           'name'=>$this->name,
           'permissions'=>$this->whenLoaded('permissions'),
           'users'=>$this->whenLoaded('users'),
       ];
    }
}