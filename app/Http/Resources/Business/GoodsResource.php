<?php

namespace App\Http\Resources\Business;

use Illuminate\Http\Resources\Json\Resource;

class GoodsResource extends Resource
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
           'salePrice'=>$this->salePrice,
           'linePrice'=>$this->linePrice,
           'salesInitial'=>$this->salesInitial,
           'salesActual'=>$this->salesActual,
           'imgs'=>$this->imgs,
           'detail'=>$this->detail,
           'stockCalcuType'=>$this->stockCalcuType,
           'status'=>$this->status,
           'stockNum'=>$this->stockNum,
           'isMultipleSpec'=>$this->isMultipleSpec,
           'goodsCategoryId'=>$this->goodsCategoryId,
           'createdAt'=>$this->createdAt,
           'updatedAt'=>$this->updatedAt,
           'goodsCategory'=>$this->whenLoaded('goodsCategory'),
       ];
    }
}
