<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    protected $table = 'tasks';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task_category() {
        return $this->belongsTo('App\tasks');
    }
}
