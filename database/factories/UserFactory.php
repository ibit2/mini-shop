<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username'=>$faker->uuid,
        'pwd'=>sha1('123456'),
        'nickname'=>$faker->name,
    ];
});
