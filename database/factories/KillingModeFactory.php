<?php

use Faker\Generator as Faker;

$factory->define(App\KillingMode::class, function (Faker $faker) {
    return [
        'mode' => $faker->name,
    ];
});
