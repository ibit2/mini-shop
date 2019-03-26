<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCart extends Model
{
    use BaseModel;
    protected $guarded = [];
    protected $casts=[
        'goods_sale_price' => 'double',
    ];
}
