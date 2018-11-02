<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    static function getOrCreateByName($name)
    {
        return Player::firstOrCreate(compact('name'));
    }
}
