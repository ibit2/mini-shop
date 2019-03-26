<?php

namespace App\Http\Resources\Consumer;

use Illuminate\Http\Resources\Json\Resource;

class GoodsSpecResource extends Resource
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
           'goodsSpecValues'=>new GoodsSpecValueCollection($this->whenLoaded('goodsSpecValues')),
       ];
    }
}
