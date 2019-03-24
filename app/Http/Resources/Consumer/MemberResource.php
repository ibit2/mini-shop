<?php

namespace App\Http\Resources\Consumer;

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
           'createdAt'=>$this->createdAt,

       ];
    }
}
