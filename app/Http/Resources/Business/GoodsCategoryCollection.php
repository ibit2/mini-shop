<?php

namespace App\Http\Resources\Business;


use App\Http\Resources\ResourceCollection;

class GoodsCategoryCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
