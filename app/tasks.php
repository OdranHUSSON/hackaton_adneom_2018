<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class tasks extends Model
{
    protected $table = 'tasks';

    /**
     * @return BelongsTo
     */
    public function task_category() {
        return $this->belongsTo('App\tasks');
    }

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'users_tasks',
            null,
            'users_id'
        )->withTimestamps();
    }
}
