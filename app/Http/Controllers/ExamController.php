<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function addExam(Request $request,$subject_id){

        $exam = new Exam();
        $exam->subject_id=$subject_id;
        $exam->description_about_exam=$request->description;
        $exam->guidline=$request->guidline;
        $exam->student_id=13;
        $exam->teacher_id=12;
        $exam->add_exam_paper='asdfg';
        $exam->date_and_time='838:59:59';
        $exam->grade=5;
        $exam->save();
        return redirect('/');

    }
}
