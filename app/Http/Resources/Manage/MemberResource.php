<?php

namespace App\Http\Resources\Manage;

use Illuminate\Http\Resources\Json\Resource;

class MemberResource extends Resource
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
           'phone'=>$this->phone,
           'avatar'=>$this->avatar,
           'nickname'=>$this->nickname,
           'isAvailable'=>$this->isAvailable,
           'createdAt'=>$this->createdAt,
           'updatedAt'=>$this->updatedAt,
       ];
    }
}
