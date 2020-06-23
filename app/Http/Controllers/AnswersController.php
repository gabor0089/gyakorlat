<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Question;
use \App\Answer;

class AnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $data=request()->validate([
        	'valasz'=>'required',
        	'question_id'=>'required',
        ]);
        auth()->user()->answers()->create($data);
        return redirect('/q/'.$data['question_id']);
    }
}
