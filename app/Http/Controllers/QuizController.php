<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
   public function addQuiz(Request $request,$subject_id){
       $quiz=new Quiz();
       $quiz->description_about_quiz=$request->description;
       $quiz->add_quiz_paper='Quiz.pdf';
       $quiz->guidline=$request->guidline;
       $quiz->grade=9;
       $quiz->teacher_id=12;
       $quiz->date_and_time='838:59:59';
       $quiz->subject_id=$subject_id;
       $quiz->save();
       return redirect('/');

       

   }
}
