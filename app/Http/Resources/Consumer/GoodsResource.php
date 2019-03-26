<?php

namespace App\Http\Resources\Consumer;

use Illuminate\Http\Resources\Json\Resource;

class GoodsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'salePrice' => $this->salePrice,
            'salesInitial' => $this->salesInitial,
            'imgs' => $this->imgs,
            'detail' => $this->detail,
            'stockCalcuType' => $this->stockCalcuType,
            'stockNum' => $this->stockNum,
            'isMultipleSpec' => $this->isMultipleSpec,
            'goodsSkus' => $this->whenLoaded('goodsSkus'),
            'goodsSpecs' => new GoodsSpecCollection($this->whenLoaded('goodsSpecs')),
        ];
    }
}
