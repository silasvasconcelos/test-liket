<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;
    protected $fillable = ['game_hash_file'];

    /**
     * @return string String with name of game
     */
    public function getNameAttribute()
    {
        return sprintf("Game %s", $this->getKey());
    }

    /**
     * Get or create a game
     *
     * @return Game object
     */
    static function getOrCreateByHash($game_hash_file)
    {
        return Game::firstOrCreate(compact('game_hash_file'));
    }
}
