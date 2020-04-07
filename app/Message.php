<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Scope a query to only published series.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '!=', null);
    }

    public function isPublished() {
        return isset($this->published_at);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
