<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task_category extends Model
{
    protected $table = 'task_category';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks() {
        return $this->hasMany('App\tasks');
    }
}
