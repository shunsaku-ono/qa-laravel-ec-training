<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->unique()->lexify('商品????'),
        'category_id' => mt_rand(1, 5),
        'price' => $faker->numberBetween(1000, 200000),
        'discription' => $faker->text,
        'sale_status_id' => mt_rand(1, 5),
        'product_status_id' => mt_rand(1, 3),
        'regist_date' => $faker->date,
        'delete_flag' => 0,
        // 'user_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
