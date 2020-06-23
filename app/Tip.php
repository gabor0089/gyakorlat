<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
     protected $fillable = [
        'tip','question_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function question()
    {
    	return $this->belongsTo(Question::class);
    }
        public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
