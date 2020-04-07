<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function serie() {
        return $this->belongsTo('App\Serie');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

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

    public function previous() {
        $series = $this->serie;
        $previous_id = $series->posts()->where('id', '<', $this->id)->max('id');
        $post = Post::find($previous_id);
        return $post ? $post : '{}';
    }

    public function next() {
        $series = $this->serie;
        $next_id = $series->posts()->where('id', '>', $this->id)->min('id');
        $post = Post::find($next_id);
        return $post ? $post : '{}';
    }
}
