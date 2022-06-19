<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // public function selectSubjects(Request $request)
    // { 
    //     $sub = new Subject();
    //     $sub -> subjectName = $request->selectSubject;
    //     $sub -> teacher_id = '1' ;
    //     $sub -> save();

    //     $subjectname = Subject::latest('created_at')->first();
    //     $gradename = Classroom::latest('created_at')->first();
    //     return view('uploading_section/teacher_module_view',['subjectname' => $subjectname , 'gradename'=>$gradename]);
    //     // $sub = new Subject();
    //     // $sub -> subjectName =  $request->selectSubject;
    //     // $sub -> teacher_id =  1;
    //     // $sub -> save();
    //     // return redirect()->back()->withSuccess('IT WORKS!');
    // }

    public function selectSubjects(Request $request)
    {
        $grd = new Classroom();
        $sub = new Subject();
        $grd -> gradeName = $request->selectGrade;
        $grd -> teacher_id = '1' ;
        $grd -> student_id = '1' ;
        $sub -> subjectName = $request->selectSubject;
        $sub -> teacher_id = '1' ;
        $sub -> save();
        $grd -> save();

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',['gradename'=>$gradename , 'subjectname' => $subjectname]);
    }

    public function displaymoduleview()
    {
        $subjectname = Subject::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',['subjectname' => $subjectname , 'gradename'=>$gradename]);
    }
}
