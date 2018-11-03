<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerKillsGamer extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'game_id';
    protected $fillable = [
        'game_id',
        'killer_player_id',
        'killed_player_id',
        'mode_id',
        'time',
    ];

    /**
     * Relationship with players table to killer
     *
     * @return Player object
     */
    function killer()
    {
    	return $this->belongsTo(Player::class, 'killer_player_id');
    }

     /**
     * Relationship with players table to killed
     *
     * @return Player object
     */
    function killed()
    {
    	return $this->belongsTo(Player::class, 'killed_player_id');
    }

     /**
     * Relationship with games table to game
     *
     * @return Game object
     */
    function game()
    {
    	return $this->belongsTo(Game::class);
    }

     /**
     * Relationship with killing_modes table to mode of kill
     *
     * @return KillingMode object
     */
    function mode()
    {
    	return $this->belongsTo(KillingMode::class);
    }
}
