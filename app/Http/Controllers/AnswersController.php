<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function tipstore()
    {
        $data=request()->validate(['mins'=>'required','question_id'=>'required','valasz'=>'']);
        auth()->user()->answers()->create($data);
        return redirect('/question/all');
    }
}
