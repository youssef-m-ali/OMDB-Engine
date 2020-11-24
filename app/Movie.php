<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function nominations()
    {
        return $this->belongsToMany('App\Nomination');
    }
}
