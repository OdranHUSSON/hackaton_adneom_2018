<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Level
 *
 * @package App
 */
class Level extends Model
{
    protected $table = 'levels';

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'users_levels',
            'levels_id',
            'users_id'
        )->withTimestamps();
    }
}
