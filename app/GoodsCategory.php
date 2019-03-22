<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsCategory extends Model
{
    use SoftDeletes;
    use BaseModel;
    protected $guarded = [];
    protected $attributes=[
        'icon'=>'https://iocaffcdn.phphub.org/uploads/avatars/12485_1523190446.jpg!/both/200x200',
    ];
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];
}
