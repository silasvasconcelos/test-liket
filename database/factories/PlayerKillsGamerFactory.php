<?php

use Faker\Generator as Faker;

$factory->define(App\PlayerKillsGamer::class, function (Faker $faker) {
	$game_factory = factory(App\Game::class)->create();
	$player_killer_factory = factory(App\Player::class)->create();
	$player_killed_factory = factory(App\Player::class)->create();
	$killing_mode_factory = factory(App\KillingMode::class)->create();

    return [
        'game_id' => $game_factory->getKey(),
        'killer_player_id' => $player_killer_factory->getKey(),
        'killed_player_id' => $player_killed_factory->getKey(),
        'mode_id' => $killing_mode_factory->getKey(),
        'time' => date('H:i'),
    ];
});
