<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Question;
use \App\Tip;
class QuestionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($question)
    {
        $user=User::find($question);
        return view('home',['user'=>$user,]);
    }

    public function indexall()
    {
        $questions=Question::all();
        return view('home',['questions'=>$questions,]);
    }

    public function create()
    {
    	return view('questions.create');
    }

    public function store()
    {
        $data=request()->validate(['kerdes'=>'required']);
        auth()->user()->questions()->create($data);
        return redirect('/home');
    }

    public function show(Question $question)
    {
        return view('questions.show',compact('question'));
    }
}
