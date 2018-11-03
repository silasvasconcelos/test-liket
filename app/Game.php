<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;
    protected $fillable = ['game_hash_file'];
    protected $hidden = ['game_hash_file'];
    protected $appends = [
        'name',
        'kills_by_means',
    ];

    /**
     * @return string String with name of game
     */
    public function getNameAttribute()
    {
        return sprintf("Game %s", $this->getKey());
    }

    /**
     * @return array Array with names and num of killing modes
     */
    public function getKillsByMeansAttribute()
    {
        return  array_count_values($this->killingModes()->pluck('mode')->toArray());
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

    /**
     * summary
     *
     * @return void
     * @author 
     */
    function killingModes()
    {
        return $this->hasManyThrough(KillingMode::class, PlayerKillsGamer::class, 'game_id', 'id', 'id', 'mode_id');
    }
}
