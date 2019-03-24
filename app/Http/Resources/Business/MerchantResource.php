<?php

namespace App\Http\Resources\Business;

use Illuminate\Http\Resources\Json\Resource;

class MerchantResource extends Resource
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
           'name'=>$this->name,
           'avatar'=>$this->avatar,
           'status'=>$this->status,
           'isAvailable'=>$this->isAvailable,
           'createdAt'=>$this->createdAt,
           'updatedAt'=>$this->updatedAt,

       ];
    }
}
