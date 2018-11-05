<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Player;

class PlayerModelTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * test if has number of player in datta
     *
     * @return void
     */
    public function testList()
    {
    	$player_factory = factory(Player::class, 3)->create();
    	$player = Player::all();
    	
        $this->assertCount(3, $player);
    }

    /**
     * test if player exists
     *
     * @return void
     */
    public function testExists()
    {
    	$player_factory = factory(Player::class)->create();

        $this->assertDatabaseHas($player_factory->getTable(), ['name' => $player_factory->name]);
    }

    /**
     * test create a new player
     *
     * @return void
     */
    public function testCreate()
    {
    	$player_factory = factory(Player::class)->create();

        $this->assertTrue($player_factory->wasRecentlyCreated);
    }

    /**
     * test updating the player
     *
     * @return void
     */
    public function testUpdated()
    {
    	$player_factory = factory(Player::class)->create();
    	$player_factory->name = sprintf('Randon name %s', microtime());

        $this->assertTrue($player_factory->save());
    }

    /**
     * test delete the player
     *
     * @return void
     */
    public function testDelete()
    {
    	$player_factory = factory(Player::class)->create();

    	Player::first()->delete();

        $this->assertDatabaseMissing($player_factory->getTable(), [ 'name' => $player_factory->name ]);
    }

}