<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Question;
use \App\Tip;
use \App\Credits;

class TipsController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function store()
    {
        $data=request()->validate([
        	'tip'=>'required',
        	'question_id'=>'required',
        ]);
        auth()->user()->tips()->create($data);
        return redirect('/q/'.$data['question_id']);

    }

}
