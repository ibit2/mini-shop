<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Goods::class, function (Faker $faker) {
    return [
        'name'=>'商品名称-'.$faker->uuid,
        'price'=>$faker->randomNumber(),
        'sales_initial'=>$faker->randomNumber(),
        'sales_actual'=>$faker->randomNumber(),
        'imgs'=>[$faker->imageUrl(),$faker->imageUrl(),$faker->imageUrl(),$faker->imageUrl(),$faker->imageUrl()],
        'detail'=>'详情',
        'stock_calcu_type'=>$faker->randomElement([1,2]),
        'status'=>$faker->randomElement([1,0]),
        'goods_category_id'=>$faker->numberBetween(1,8),
        'merchant_id'=>$faker->numberBetween(1,100),

    ];
});
