<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return BelongsToMany
     */
    public function success()
    {
        return $this->belongsToMany(
            Success::class,
            'users_success',
            'users_id',
            'success_id'
        )->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function tasks()
    {
        return $this->belongsToMany(
            tasks::class,
            'users_tasks',
            'users_id',
            'tasks_id'
        )->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function levels()
    {
        return $this->belongsToMany(
            Level::class,
            'users_levels',
            'users_id',
            'levels_id'
        )->withTimestamps();
    }

    /**
     * @return string
     */
    public function level() {
        return "TODO";
    }
}
