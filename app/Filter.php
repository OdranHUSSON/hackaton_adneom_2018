<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Filter extends Model
{
    protected $table = 'filter';

    /**
     * @return BelongsToMany
     */
    public function success()
    {
        return $this->belongsToMany(
            Success::class,
            'success_filter',
            'filter_id',
            'success_id'
        )->withTimestamps();
    }
}
