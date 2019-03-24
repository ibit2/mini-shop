<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use BaseModel, SoftDeletes;
    protected $guarded = [];
    //禁止转换的属性
    protected $prohibitedAttributes = [
        'goodsCategory'
    ];
    protected $casts = [
        'status' => 'boolean',
        'imgs' => 'array',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];

    public function goodsCategory()
    {
        return $this->belongsTo(GoodsCategory::class, 'goods_category_id', 'id');
    }
}
