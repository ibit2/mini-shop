<?php namespace App\Filters;

use EloquentFilter\ModelFilter;

class GoodsCategoryFilter extends ModelFilter
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
}
