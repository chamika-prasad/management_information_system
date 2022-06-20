<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Session;

class QuizController extends Controller
{
   public function addQuiz(Request $request,$subject_id){

   //    $request-> validate([
   //       'zoomLink'=> 'required'

   //   ]);

        $pdfname = $request->file('uploadpdf')->getClientOriginalName();
        $request->file('uploadpdf')->store('public/pdf-folder/');

       $quiz=new Quiz();
       $quiz->description_about_quiz=$request->description;
       $quiz->add_quiz_paper=$pdfname;
       $quiz->guidline=$request->guidline;
       $quiz->grade=9;
       $quiz->teacher_id=12;
       $quiz->date_and_time='838:59:59';
       $quiz->subject_id=$subject_id;
       $quiz->save();

       Session::flash('success', 'Submission successful!');
        // $message = "uploaded Successfully";
        return redirect()->back();

       

   }
   public function displayquiz()
    {
        // $message = "uploaded Successfully";
        return view('quiz_section/add_quiz');
    }
}
