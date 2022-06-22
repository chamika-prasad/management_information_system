<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Session;
use PDF;

class ExamController extends Controller
{
    public function addExam(Request $request,$subject_id){
        $file = $request->file('uploadpdf');
$destinationPath = 'public/pdf-folder/';
$originalFile = $file->getClientOriginalName();
$file->move($destinationPath, $originalFile);

        // $pdfname = $request->file('uploadpdf')->getClientOriginalName();
        // $request->file('uploadpdf')->store('public/pdf-folder/');

        $exam = new Exam();
        $exam->subject_id=$subject_id;
        $exam->description_about_exam=$request->description;
        $exam->guidline=$request->guidline;
        $exam->student_id=13;
        $exam->teacher_id=12;
        $exam->add_exam_paper=$originalFile;
        $exam->date_and_time='838:59:59';
        $exam->grade=5;
        $exam->save();

        Session::flash('success', 'Submission successful!');
        // $message = "uploaded Successfully";
        return redirect()->back();

    }

    public function displayExam()
    {
        // $message = "uploaded Successfully";
        return view('exam_section/add_exam');
    }

    public function studentdisplayExam()
    {
      
       
        // $message = "uploaded Successfully";
        return view ('exam_section/exam_student_view');
    }
    public function studentuploadeanswer()
    {
      
       
        // $message = "uploaded Successfully";
        return view ('exam_section/exam_student_view');
    }
    public function view_pepar()
    {

    }

}



