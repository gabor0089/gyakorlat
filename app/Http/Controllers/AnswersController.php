<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Question;
use \App\Answer;
use \App\Credit;
use \App\User;
use \App\Tip;

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
        $user=User::find(auth()->user()->id);
        $question=Question::find($data['question_id']);
        $valasz=Answer::where([
            ['question_id',$data['question_id']],
            ['user_id',auth()->user()->id],
            ])->get();
        $tip=Tip::where([
            ['question_id',$data['question_id']],
            ['user_id',auth()->user()->id],
            ])->get();
        //dd($tip[0]->tip);
//        dd($question->created_at->addMinutes(10+$tip[0]->tip));
        if($question->created_at->addMinutes(10+$tip[0]->tip) > $valasz[0]->created_at)
        {
            Credit::where('user_id', auth()->user()->id)->increment('value',1);
        }
        else
        {
            Credit::where('user_id', auth()->user()->id)->decrement('value',1);
        }   
        return redirect('/q/'.$data['question_id']);
    }
}
