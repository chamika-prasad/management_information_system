<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function addQuestion(Request $request,$subject_id){
        $question=new Question();
        $question->question=$request->description;
        $question->subject_id=$subject_id;
        $question->student_id=13;
       $question->save();
       return redirect('/');

    }
}