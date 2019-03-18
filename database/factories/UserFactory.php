<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username'=>$faker->userName,
        'pwd'=>sha1('123456'),
        'nickname'=>$faker->name,
    ];
});
