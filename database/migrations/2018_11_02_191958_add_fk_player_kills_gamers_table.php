<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPlayerKillsGamersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_kills_gamers', function (Blueprint $table)
        {
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('killer_player_id')->references('id')->on('players');
            $table->foreign('killed_player_id')->references('id')->on('players');
            $table->foreign('mode_id')->references('id')->on('modes');
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
        Schema::table('player_kills_gamers', function (Blueprint $table)
        {
            $table->dropForeign(['game_id', 'killer_player_id', 'killed_player_id', 'mode_id']);
        }
         );
    }
}
