<?php namespace App\Filters;

use EloquentFilter\ModelFilter;

class GoodsFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function lastId($lastId=0)
    {
        return $this->where('id', '>', $lastId);
    }
    public function merchantId($merchantId)
    {
        return $this->where('merchant_id', $merchantId);
    }
    public function goodsCategoryId($goodsCategoryId)
    {
        return $this->where('goods_category_id', $goodsCategoryId);
    }
}
