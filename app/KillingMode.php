<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KillingMode extends Model
{
    public $timestamps = false;
    protected $fillable = ['mode'];

    static function getOrCreateByName($mode)
    {
        return KillingMode::firstOrCreate(compact('mode'));
    }
}
