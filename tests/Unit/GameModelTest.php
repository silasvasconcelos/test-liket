<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Game;

class GameModelTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * test if has number of games in datta
     *
     * @return void
     */
    public function testList()
    {
    	$games_factory = factory(Game::class, 3)->create();
    	$games = Game::all();
    	
        $this->assertCount(3, $games);
    }

    /**
     * test if game exists
     *
     * @return void
     */
    public function testExists()
    {
    	$game_factory = factory(Game::class)->create();

        $this->assertDatabaseHas($game_factory->getTable(), ['game_hash_file' => $game_factory->game_hash_file]);
    }

    /**
     * test create a new game
     *
     * @return void
     */
    public function testCreate()
    {
    	$game_factory = factory(Game::class)->create();

        $this->assertTrue($game_factory->wasRecentlyCreated);
    }

    /**
     * test updating the game
     *
     * @return void
     */
    public function testUpdated()
    {
    	$game_factory = factory(Game::class)->create();
    	$game_factory->game_hash_file = sha1(microtime());

        $this->assertTrue($game_factory->save());
    }

    /**
     * test delete the game
     *
     * @return void
     */
    public function testDelete()
    {
    	$game_factory = factory(Game::class)->create();

    	Game::first()->delete();

        $this->assertDatabaseMissing($game_factory->getTable(), [ 'game_hash_file' => $game_factory->game_hash_file ]);
    }

}