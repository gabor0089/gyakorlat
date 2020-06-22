<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded=[];
     protected $fillable = [
        'user_id', 'question_id', 'mins',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function question()
    {
    	return $this->belongsTo(Question::class);
    }
}
