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
}
