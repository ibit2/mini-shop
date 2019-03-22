<?php

namespace App\Http\Resources\Manage;

use Illuminate\Http\Resources\Json\Resource;

class GoodsCategoryResource extends Resource
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
           'pid'=>$this->pid,
           'name'=>$this->name,
           'icon'=>$this->icon,
           'order'=>$this->order,
           'createdAt'=>$this->createdAt,
           'updatedAt'=>$this->updatedAt,
       ];
    }
}
