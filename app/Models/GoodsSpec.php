<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsSpec extends Model
{
    use BaseModel;
    protected $guarded = [];
    //禁止转换的属性
    protected $prohibitedAttributes = [
        'goodsSpecValues',
    ];

    public function goodsSpecValues()
    {
        return $this->hasMany(GoodsSpecValue::class, 'goods_spec_id', 'id');
    }
}
