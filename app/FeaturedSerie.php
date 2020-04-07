<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedSerie extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $hidden = [
        'deleted_at', 'updated_at',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function serie() {
        return $this->belongsTo('App\Serie');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
