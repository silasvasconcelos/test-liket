<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerKillsGamersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_kills_gamers', function (Blueprint $table)
        {
            $table->integer('game_id');
            $table->integer('killer_player_id');
            $table->integer('killed_player_id');
            $table->integer('mode_id');
            $table->time('time');
        }
         );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_kills_gamers');
    }
}
