<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;
    protected $fillable = ['game_hash_file'];

    static function getOrCreateByHash($game_hash_file)
    {
        return Game::firstOrCreate(compact('game_hash_file'));
    }
}
