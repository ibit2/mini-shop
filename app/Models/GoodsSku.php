<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsSku extends Model
{
    use BaseModel;
    protected $guarded = [];
    protected $casts = [
        'sale_price' => 'double',
        'line_price' => 'double',
        'is_default' => 'boolean',
    ];
}
