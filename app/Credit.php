<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $guarded=[];
    
    protected $fillable = [
        'user_id', 'value',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
