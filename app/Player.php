<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    /**
     * Get or create a player
     *
     * @return Player object
     */
    static function getOrCreateByName($name)
    {
        return Player::firstOrCreate(compact('name'));
    }

    /**
     * Get deaths to show
     *
     * @return integer
     */
    function getMyKillsAttribute()
    {
        $kills =  $query = $this->kills()->count();
        $deaths = $this->deaths()->whereDoesntHave('killed', function ($query) {
            return $query->withWord();
        })->count();
        return ($kills - $deaths);
    }

    /**
     * Query scope to remove words user
     *
     * @return QueryBuilder object
     */
    function scopeWithoutWord($query)
    {
        return $query->where('name', '!=', '<world>');
    }

    /**
     * Query scope to only get words user
     *
     * @return QueryBuilder object
     */
    function scopeWithWord($query)
    {
        return $query->where('name', '<world>');
    }

    /**
     * Query scope to remove words user
     *
     * @param string $search String with content to search
     * @return QueryBuilder object
     */
    function scopeFilter($query, string $search)
    {
        if (empty($search)) {
            return $query;
        }
        return $query->where('name', 'ilike', sprintf("%%%s%%", $search));
    }

    /**
     * Get Kills of player
     *
     * @return QueryBuilder object
     */
    function kills()
    {
        return $this->hasMany(PlayerKillsGamer::class, 'killer_player_id');
    }

    /**
     * Get Kills of player
     *
     * @return QueryBuilder object
     */
    function deaths()
    {
        return $this->hasMany(PlayerKillsGamer::class, 'killed_player_id');
    }
}
