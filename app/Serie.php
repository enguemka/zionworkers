<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at', 'updated_at',
    ];

    public function searchableAs()
    {
        return 'series';
    }

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    public function isPublished() {
        return isset($this->published_at);
    }

    public function isNotPublished() {
        return !isset($this->published_at);
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function subscriptions() {
        return $this->hasMany('App\Subscription');
    }

    public function watchlists() {
        return $this->hasMany('App\WatchList');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '!=', null);
    }

    public function getPostCountAttribute()
    {
        return $this->posts()->published()->count();
    }

    public function latestEpisode() {
        return $this->posts()->published()->orderBy('created_at', 'desc')->first();
    }

    public function firstEpisode() {
        return $this->posts()->published()->orderBy('created_at', 'asc')->first();
    }
}
