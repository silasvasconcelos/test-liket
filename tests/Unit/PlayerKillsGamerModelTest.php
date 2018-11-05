<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\PlayerKillsGamer;

class PlayerKillsGamerModelTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * test if has number of player kills gamer in datta
     *
     * @return void
     */
    public function testList()
    {
        $player_kills_gamer_factory = factory(PlayerKillsGamer::class, 3)->create();
    	$player_kills_gamer = PlayerKillsGamer::all();
    	
        $this->assertCount(3, $player_kills_gamer);
    }

    /**
     * test if player kills gamer exists
     *
     * @return void
     */
    public function testExists()
    {
    	$player_kills_gamer_factory = factory(PlayerKillsGamer::class)->create();

        $this->assertDatabaseHas($player_kills_gamer_factory->getTable(), $player_kills_gamer_factory->toArray());
    }

    /**
     * test create a new player kills gamer
     *
     * @return void
     */
    public function testCreate()
    {
    	$player_kills_gamer_factory = factory(PlayerKillsGamer::class)->create();

        $this->assertTrue($player_kills_gamer_factory->wasRecentlyCreated);
    }

    /**
     * test delete the player kills gamer
     *
     * @return void
     */
    public function testDelete()
    {
    	$player_kills_gamer_factory = factory(PlayerKillsGamer::class)->create();

    	PlayerKillsGamer::first()->delete();

        $this->assertDatabaseMissing($player_kills_gamer_factory->getTable(), $player_kills_gamer_factory->toArray());
    }

}