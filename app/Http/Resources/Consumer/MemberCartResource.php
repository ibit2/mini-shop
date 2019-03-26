<?php

namespace App\Http\Resources\Consumer;

use Illuminate\Http\Resources\Json\Resource;

class MemberCartResource extends Resource
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
           'goodsId'=>$this->goodsId,
           'goodsSkuId'=>$this->goodsSkuId,
           'goodsName'=>$this->goodsName,
           'purchaseNum'=>$this->purchaseNum,
           'goodsSalePrice'=>$this->goodsSalePrice,
           'goodsStockNum'=>$this->goodsStockNum,
           'goodsSpecValuePath'=>$this->goodsSpecValuePath,
           'goodsSpecValuePathShow'=>$this->goodsSpecValuePathShow,

       ];
    }
}
