<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Goods::class, function (Faker $faker) {
    return [
        'name'=>'商品名称-'.$faker->uuid,
        'sale_price'=>$faker->numberBetween(1,100),
        'line_price'=>$faker->numberBetween(1,100),
        'sales_initial'=>$faker->randomNumber(),
        'sales_actual'=>$faker->randomNumber(),
        'imgs'=>[$faker->imageUrl(),$faker->imageUrl(),$faker->imageUrl(),$faker->imageUrl(),$faker->imageUrl()],
        'detail'=>'详情',
        'stock_calcu_type'=>$faker->randomElement([1,2]),
        'stock_num'=>$faker->randomNumber(),
        'is_multiple_spec'=>$faker->randomElement([1,0]),
        'status'=>$faker->randomElement([1,0]),
        'goods_category_id'=>$faker->numberBetween(1,8),
        'merchant_id'=>$faker->numberBetween(1,100),

    ];
});
