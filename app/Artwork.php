<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artwork extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function images() {
        return $this->hasMany('App\Image');
    }
}
