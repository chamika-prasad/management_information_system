<?php

namespace App\Http\Controllers;
use App\Models\UploadingContent;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\GradeSemThree;
use App\Models\GradeSemtwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadingContentController extends Controller
{
    public function displaymaterials()
    {

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        
        return view('uploading_section/uploading_materials'
        ,[
            'gradename'=>$gradename , 'subjectname' => $subjectname,
        ]);
    }

    //uploading materials to the database

    public function storematerials(Request $request)
    {

        $date1 =  date('d', strtotime("next Sunday"));
        $date2 =  date('d', strtotime("next Sunday +7 days"));

        $request-> validate([
            'createzoomlink'=> 'required|url'          
        ]);
        $request-> validate([
            'createrecord'=> 'required|url'          
        ]);
        $request-> validate([
            'createPdf' => 'required|mimes:pdf,doc,docx|max:4096',          
        ]);
        $request-> validate([
            'datetime'=> 'required'          
        ]);

        $pdfName = $request->file('createPdf')->getClientOriginalName();
        $request->file('createPdf')->store('public/pdfs/');


        $Uploadingdummy = new UploadingContent();
        $Uploadingdummy->zoomLink = $request->createzoomlink;
        $Uploadingdummy->pdf = $pdfName;
        $Uploadingdummy->recordingLink= $request->createrecord;
        $currentDate = $Uploadingdummy->Date= $request->datetime;
        $Uploadingdummy->subject_id = '1';
        $Uploadingdummy->grade_name = '3';

        $strcurrentDate = strval($currentDate);
        $substring1 = substr($strcurrentDate, -2);

        if($date1 == $substring1 || $date2 == $substring1)
        {
            $Uploadingdummy-> save();
            return redirect()->back()->with('message', 'File uploaded successfully.');
        }
        else
        {
            return redirect()->back()->with('errormessage', 'Should enter next two sundays only');
        }
        
    }


    //student module view return and display sore data of uploading materials

    public function displayStudentModuleView()
    {

        $sqldate1 =  date('Y-m-d', strtotime("next Sunday"));
        $sqldate2 =  date('Y-m-d', strtotime("next Sunday +7 days"));

        $lasts = DB::table("uploading_contents")
                ->where("date", "=", $sqldate1)
                ->orderBy("updated_at","desc")
                ->limit(1)
                ->get();

        $fasts = DB::table("uploading_contents")
                ->where("date", "=", $sqldate2)
                ->orderBy("updated_at","desc")
                ->limit(1)
                ->get();

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();

        $day1=strtotime("next Sunday");
        $date1 =  date('Y M d ' , $day1);

        $day2=strtotime("next Sunday +7 days");
        $date2 =  date('Y M d ' , $day2);

        return view('uploading_section/student_ module_view',[
            'lasts' => $lasts ,'gradename'=>$gradename , 'subjectname' => $subjectname ,
            'fasts' => $fasts , 'date1' => $date1 , 'date2' => $date2
        ]);
    }


    // //teacher module view

    //sent  $day1 to the uploading materials
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

        $day1=strtotime("next Sunday");
        $date1 =  date('Y M d ' , $day1);

        $day2=strtotime("next Sunday +7 days");
        $date2 =  date('Y M d ' , $day2);

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
    //     $lasts = UploadingContent::latest('created_at')->first();
    //     $fast = UploadingContent::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',[
            'gradename'=>$gradename , 'subjectname' => $subjectname , 
            'date1' => $date1,
            'date2' => $date2,
        ]);
    }

    //sent  $day1 to the uploading materials

    public function displaymoduleview()
    {
        $day1=strtotime("next Sunday");
        $date1 =  date('Y M d ' , $day1);

        $day2=strtotime("next Sunday +7 days");
        $date2 =  date('Y M d ' , $day2);

        $lasts = UploadingContent::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        $fast = UploadingContent::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',[
            'subjectname' => $subjectname , 
            'gradename'=>$gradename ,
            'date1' => $date1,
            'date2' => $date2,
        ]);
    }


    //grading view

    public function gradingview()
    {
        return view('uploading_section/grading',['semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree, 'tot'=> $this-> tot]);
    }

    private $semOne ,$semTwo,$semThree,$tot;

    public function uploading1stSem(Request $request)
    {
        $request-> validate([
            'markBudhdhaCharithaya'=> 'required'
        ]);

        $request-> validate([
            'markPali'=> 'required'
        ]);

        $request-> validate([
            'markAbhi'=> 'required'
        ]);

        $request-> validate([
            'markAssignment'=> 'required'
        ]);
        $sem1 = new Grade();
        $sem1 -> semOneBudhdha = $request->markBudhdhaCharithaya;
        $sem1 -> semOnePali = $request->markPali;
        $sem1 -> semOneAbhi = $request->markAbhi;
        $sem1 -> semOneAssignment = $request->markAssignment;
        $sem1 -> student_id = '1' ;
        $this-> semOne = $sem1 -> semOneBudhdha + $sem1 -> semOnePali +  $sem1 -> semOneAbhi + $sem1 -> semOneAssignment;
        $sem1 -> save();
        return view('uploading_section/grading',[
            'semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree , 'tot'=> $this-> tot
        ]);
    }

    public function uploading2ndSem(Request $request)
    {
        $request-> validate([
            'markBudhdhaCharithaya'=> 'required'
        ]);

        $request-> validate([
            'markPali'=> 'required'
        ]);

        $request-> validate([
            'markAbhi'=> 'required'
        ]);

        $request-> validate([
            'markAssignment'=> 'required'
        ]);
        $sem1 = new GradeSemtwo();
        $sem1 -> semTwoBudhdha = $request->markBudhdhaCharithaya;
        $sem1 -> semTwoPali = $request->markPali;
        $sem1 -> semTwoAbhi = $request->markAbhi;
        $sem1 -> semTwoAssignment = $request->markAssignment;
        $sem1 -> student_id = '1' ;
        $this-> semTwo = $sem1 -> semTwoBudhdha + $sem1 -> semTwoPali +  $sem1 -> semTwoAbhi + $sem1 -> semTwoAssignment;
        $sem1 -> save();
        return view('uploading_section/grading',[
            'semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree , 'tot'=> $this-> tot
        ]);
        
    }

    public function uploading3rdSem(Request $request)
    {
        $students = DB::table("users")
            ->select("firstname", "id")
            ->where("usertype", "=", 3)
            ->get();
        
        $request-> validate([
            'markBudhdhaCharithaya'=> 'required'
        ]);

        $request-> validate([
            'markPali'=> 'required'
        ]);

        $request-> validate([
            'markAbhi'=> 'required'
        ]);

        $request-> validate([
            'markAssignment'=> 'required'
        ]);
        $sem1 = new GradeSemThree();
        $sem1 -> semThreeBudhdha = $request->markBudhdhaCharithaya;
        $sem1 -> semThreePali = $request->markPali;
        $sem1 -> semThreeAbhi = $request->markAbhi;
        $sem1 -> semThreeAssignment = $request->markAssignment;
        $sem1 -> student_id = '1' ;
        $this-> semThree = $sem1 -> semThreeBudhdha + $sem1 -> semThreePali +  $sem1 -> semThreeAbhi + $sem1 -> semThreeAssignment;
        $sem1 -> save();
        return view('uploading_section/grading',[
            'semOne' => $this-> semOne,
            'semTwo' =>  $this->semTwo,
            'semThree' =>  $this-> semThree , 
            'tot'=> $this-> tot,
            'students' => $students
        ]);
        
    }

    public function showReasaultDisplay()
    {

        $sem1 = Grade::latest('created_at')->first();
        $sem2 = GradeSemtwo::latest('created_at')->first();
        $sem3 = GradeSemThree::latest('created_at')->first();
        
        return view('uploading_section/showResault',['sem1' => $sem1 , 'sem2' => $sem2 , 'sem3' => $sem3]);
    }

    public function addsubjectDisplay()
    {
        return view(('uploading_section/addsubjects'));
    }


}
