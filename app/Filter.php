<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filter extends Model
{
    protected $table = 'filter';

    /**
     * @return BelongsTo
     */
    public function success()
    {
        return $this->belongsTo(Success::class);
    }

    /**
     * @return BelongsTo
     */
    public function taskCategory()
    {
        return $this->belongsTo(task_category::class);
    }
}
