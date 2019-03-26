<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use BaseModel, SoftDeletes;
    protected $fillable = [
        'name',
        'salePrice',
        'linePrice',
        'salesInitial',
        'sales_actual',
        'imgs',
        'detail',
        'stockCalcuType',
        'isMultipleSpec',
        'stockNum',
        'status',
        'goodsCategoryId',
        'merchantId',
    ];
    //禁止转换的属性
    protected $prohibitedAttributes = [
        'goodsCategory',
        'goodsSkus',
        'goodsSpecs',
    ];
    protected $casts = [
        'status' => 'boolean',
        'is_multiple_spec' => 'boolean',
        'imgs' => 'array',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
        'sale_price' => 'double',
        'line_price' => 'double',
    ];

    public function goodsCategory()
    {
        return $this->belongsTo(GoodsCategory::class, 'goods_category_id', 'id');
    }

    public function goodsSkus()
    {
        return $this->hasMany(GoodsSku::class,'goods_id','id');
    }
    public function goodsSpecs()
    {
        return $this->hasMany(GoodsSpec::class,'goods_id','id');
    }
}
