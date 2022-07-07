<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Session;

class QuizController extends Controller
{
    // public function sendsubgradequiz(Request $request){

    //     return view('exam_section/add_exam',['request' => $request]);

    // }
    public function addquizdetails(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'uploadpdf' => 'required|mimes:pdf',
            'reqdate' => 'required',
            'guidline' => 'required',
            
        ]);
        $addingNewQuiz = new Quiz();
        $pdfname = $request->file('uploadpdf')->getClientOriginalName();
        $request->file('uploadpdf')->store('public/pdf-folder/');

        $addingNewQuiz -> description_about_quiz = $request->description;
        $addingNewQuiz -> add_quiz_paper = $pdfname;
        $addingNewQuiz -> date_and_time = $request->reqdate;
        $addingNewQuiz -> guidline = $request->guidline;
        $addingNewQuiz -> teacher_id = '12';
        $addingNewQuiz -> subject_id = '1';
        $addingNewQuiz -> grade = '5';
        $addingNewQuiz -> save();

        return redirect()->back()->with('message', 'Exam materials successfully uploaded');
    }
    public function displayquiz(){

        return view('exam_section/Add_quiz');

    }
}
