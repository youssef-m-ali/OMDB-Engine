<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    public function movies()
    {
        return $this->belongsToMany("App\Movie");
    }
}
