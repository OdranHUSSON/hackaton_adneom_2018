<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Success
 *
 * @package App
 */
class Success extends Model
{
    protected $table = 'success';

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'users_success',
            'success_id',
            'users_id'
        )->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function filters()
    {
        return $this->hasMany(Filter::class);
    }
}
