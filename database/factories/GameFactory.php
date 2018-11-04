<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'game_hash_file' => sha1(time()),
    ];
});
