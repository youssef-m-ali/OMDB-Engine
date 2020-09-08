<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    public function upvote()
    {
        $this->votes()->updateOrCreate([
            'user_id' => auth()->id(),
        ],[
            'vote' => true
        ]);
    }
    
    public function downvote()
    {
        $this->votes()->updateOrCreate([
            'user_id' => auth()->id(),
        ],[
            'vote' => false
        ]);
    }
    public function votes(){
        return $this->hasMany(Vote::class);
    }

}
