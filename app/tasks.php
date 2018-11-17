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
            'tasks_id',
            'users_id'
        )->withTimestamps();
    }

    /**
     * @return string
     */
    public function isDone() {

        return $this->users->contains($this->id) ? "is--done" : "";
    }
}
