<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'phone'=>$faker->phoneNumber,
        'pwd'=>sha1('123456'),
        'avatar'=>'https://iocaffcdn.phphub.org/uploads/avatars/12485_1523190446.jpg!/both/200x200',
        'nickname'=>$faker->name
    ];
});
