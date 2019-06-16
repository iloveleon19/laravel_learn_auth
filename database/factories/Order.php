<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    $now = date("Y-m-d H:i:s");

    return [
        "product_id" => $faker->numberBetween(1,3),
        "price" => $faker->numberBetween(-300,300),
        "amount" => $faker->numberBetween(10,20),
        "created_by" => $faker->numberBetween(1,5),
        'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
        'updated_at' => $now,
    ];
});
