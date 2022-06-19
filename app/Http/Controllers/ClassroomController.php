<?php


namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function selectGrades(Request $request)
    {
        $grd = new Classroom();
        $grd -> gradeName = $request->selectGrade;
        $grd -> teacher_id = '1' ;
        $grd -> student_id = '1' ;
        $grd -> save();

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',['gradename'=>$gradename , 'subjectname' => $subjectname]);
        // $grd = new Classroom();
        // $grd -> gradeName =  $request->selectGrade;
        // $grd -> teacher_id =  1;
        // $grd -> student_id =  1;
        // $grd -> save();
        // return redirect()->back()->withSuccess('IT WORKS!');
    }
}
