<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\KillingMode;

class KillingModeModelTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * test if has number of player in datta
     *
     * @return void
     */
    public function testList()
    {
    	$player_factory = factory(KillingMode::class, 3)->create();
    	$player = KillingMode::all();
    	
        $this->assertCount(3, $player);
    }

    /**
     * test if player exists
     *
     * @return void
     */
    public function testExists()
    {
    	$player_factory = factory(KillingMode::class)->create();

        $this->assertDatabaseHas($player_factory->getTable(), ['mode' => $player_factory->mode]);
    }

    /**
     * test create a new player
     *
     * @return void
     */
    public function testCreate()
    {
    	$player_factory = factory(KillingMode::class)->create();

        $this->assertTrue($player_factory->wasRecentlyCreated);
    }

    /**
     * test updating the player
     *
     * @return void
     */
    public function testUpdated()
    {
    	$player_factory = factory(KillingMode::class)->create();
    	$player_factory->mode = sprintf('Randon mode %s', microtime());

        $this->assertTrue($player_factory->save());
    }

    /**
     * test delete the player
     *
     * @return void
     */
    public function testDelete()
    {
    	$player_factory = factory(KillingMode::class)->create();

    	KillingMode::first()->delete();

        $this->assertDatabaseMissing($player_factory->getTable(), [ 'mode' => $player_factory->mode ]);
    }

}