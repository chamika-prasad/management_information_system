<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\UploadingContent;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\GradeSemThree;
use App\Models\GradeSemtwo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;
use Illuminate\Support\Facades\Session;


class UploadingContentController extends Controller
{
    public function displaymaterials($addGrade,$addSubject)
    {

        // $gradename = Classroom::latest('created_at')->first();
        // $subjectname = Subject::latest('created_at')->first();
        
        return view('uploading_section/uploading_materials'
        ,[
            'addGrade'=>$addGrade , 
            'addSubject' => $addSubject,
        ]);
    }

    //uploading materials to the database

    public function storematerials(Request $request, $addGrade, $addSubject)
    {

        $date1 =  date('d', strtotime("next Sunday"));
        $date2 =  date('d', strtotime("next Sunday +7 days"));

        $request-> validate([
            'createzoomlink'=> 'required|url' ,
            'createrecord'=> 'required|url' ,
            'createPdf' => 'required|mimes:pdf,doc,docx|max:4096', 
            'datetime'=> 'required'        
        ]);

        // $subId = DB::table("subjects")
        // ->select("subjectCode")
        // ->where("subGrade", "=",$addGrade and "subjectName", "=",$addSubject)
        // ->get();

        $subId = DB::table("subjects")
            ->select("id")
            ->where("subjectName", "=", $addSubject)
            ->where("subGrade", "=", $addGrade)
            ->first();

        $pdfName = $request->file('createPdf')->getClientOriginalName();
        $request->file('createPdf')->store('public/pdfs/');


        $Uploadingdummy = new UploadingContent();
        $Uploadingdummy->zoomLink = $request->createzoomlink;
        $Uploadingdummy->pdf = $pdfName;
        $Uploadingdummy->recordingLink= $request->createrecord;
        $currentDate = $Uploadingdummy->Date= $request->datetime;
        $Uploadingdummy->subject_id = $subId->id;
        $Uploadingdummy->correctGrd = $addGrade;
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

    //student select subject returning

    public function displayStudentselectsubject()
    {
        $subjects = DB::table("subjects")
        ->select("subjectName")
        ->where("subGrade", "=", 2)
        ->orderBy('subjectName','ASC')
        ->get();
        return View('uploading_section/selectsubject',[
            'subjects' => $subjects]);
    }

    //student module view return and display stored data of uploading materials

    public function displayStudentModuleView(Request $request)
    {
        $sqldate1 =  date('Y-m-d', strtotime("next Sunday"));
        $sqldate2 =  date('Y-m-d', strtotime("next Sunday +7 days"));

        $gradename = 2;
        $subjectname = $request->stu_name1;

        $subId = DB::table("subjects")
            ->select("id")
            ->where("subjectName", "=", $subjectname)
            ->where("subGrade", "=", $gradename)
            ->first();
            
        $lasts = DB::table("uploading_contents")
                ->where("date", "=", $sqldate1)
                ->where("subject_id", "=",$subId->id)
                ->orderBy("updated_at","desc")
                ->limit(1)
                ->get();
            
        $fasts = DB::table("uploading_contents")
                ->where("date", "=", $sqldate2)
                ->where("subject_id", "=", $subId->id)
                ->orderBy("updated_at","desc")
                ->limit(1)
                ->get();

        $day1=strtotime("next Sunday");
        $date1 =  date('Y M d ' , $day1);

        $day2=strtotime("next Sunday +7 days");
        $date2 =  date('Y M d ' , $day2);

        return view('uploading_section/student_module_view',[
            'lasts' => $lasts ,'gradename'=>$gradename , 'subjectname' => $subjectname ,
            'fasts' => $fasts , 'date1' => $date1 , 'date2' => $date2
        ]);
    }

    public function downloadpdf($pdf)
    {
        return response()->download(storage_path('app/public/pdfs/'.$pdf));
    }

    //select module attendance view

    public function displayModuleSelectionAttendance(Request $request)
    {
        $addNewSubject = new Subject();
        $addNewSubject -> subjectName = $request->addSubName;
        $addNewSubject -> subjectCode = $request->addSubCode;
        $addNewSubject -> subGrade = $request->addGrade;
        $addNewSubject -> teacher_id = '1' ;

        $grades = DB::table("subjects")
            ->select("subGrade")
            ->orderBy('subGrade','ASC')
            ->distinct()
            ->get();   

        return view('uploading_section/select_module_attendance',compact('grades'),[
        ]);
    }

    //select module view

    public function displayModuleSelection(Request $request)
    {
        $addNewSubject = new Subject();
        $addNewSubject -> subjectName = $request->addSubName;
        $addNewSubject -> subjectCode = $request->addSubCode;
        $addNewSubject -> subGrade = $request->addGrade;
        $addNewSubject -> teacher_id = '1' ;

        $grades = DB::table("subjects")
            ->select("subGrade")
            ->orderBy('subGrade','ASC')
            ->distinct()
            ->get();   

        // $select_subject = DB::table("subjects")
        //     ->select("subjectName")
        //     ->where("subGrade", "=", 1)
        //     ->get();

        return view('uploading_section/select_module',compact('grades'),[
            // 'grades' => $grades ,
            // 'select_subject' => $select_subject 
        ]);
    }
    // select module view jquery method
    public function findGrade(Request $request)
    {
        $data = DB::table("subjects")
        ->select("subjectName")
        ->where("subGrade", "=", $request->subGrade)
        ->orderBy('subjectName','ASC')
        ->get();
        return response()->json($data);
    }



    // //teacher module view
    public function selectSubjects(Request $request)
    {
        $addGrade = $request->stu_name1;
        $addSubject = $request->stu_name2;
        
        $day1=strtotime("next Sunday");
        $date1 =  date('Y M d ' , $day1);

        $day2=strtotime("next Sunday +7 days");
        $date2 =  date('Y M d ' , $day2);

        return view('uploading_section/teacher_module_view',[
            'addGrade' => $addGrade , 
            'addSubject' => $addSubject ,
            'date1' => $date1,
            'date2' => $date2,
        ]);
    }


    // public function displaymoduleview()
    // {
    //     $day1=strtotime("next Sunday");
    //     $date1 =  date('Y M d ' , $day1);

    //     $day2=strtotime("next Sunday +7 days");
    //     $date2 =  date('Y M d ' , $day2);

    //     return view('uploading_section/teacher_module_view',[
    //         'date1' => $date1,
    //         'date2' => $date2,
    //     ]);
    // }


    //grading view

    public function gradingview()
    {
        $students = DB::table("users")
            ->select("firstname","lastname", "id")
            ->where("usertype", "=", 3)
            ->get();

        $stu_grades = DB::table("subjects")
            ->select("subGrade")
            ->orderBy('subGrade','ASC')
            ->distinct()
            ->get();

            return view('uploading_section/grading',[
                'students' => $students,
                'stu_grades' => $stu_grades
            ]);
    }


    public function showReasaultDisplay(Request $request)
    {
        $selectStu = $request->stu_name;
        $selectGrd = $request->grd_name;
        
        return view('uploading_section/showResault',[
            'selectStu' => $selectStu , 'selectGrd' => $selectGrd
        ]);
    }

    public function uploadingStuName(Request $request)
    {
        $grd_name = $request->subGrade;
        $name =$request->stu_name;

        $sem1a = $request->sem1a;
        $sem2a = $request->sem2a;
        $sem3a = $request->sem3a;
        $sem1b = $request->sem1b;
        $sem2b = $request->sem2b;
        $sem3b = $request->sem3b;
        $sem1c = $request->sem1c;
        $sem2c = $request->sem2c;
        $sem3c = $request->sem3c;
        $sub1 = $request->subName1;        
        dd($sub1);

        $request-> validate([
            'sem1a'=> 'required',
            'sem2a'=> 'required',
            'sem3a'=> 'required',
            'sem1b'=> 'required',
            'sem2b'=> 'required',
            'sem3b'=> 'required',
            'sem1c'=> 'required',
            'sem2c'=> 'required',
            'sem3c'=> 'required'
            
        ]);
        return redirect()->back();

        // return view('uploading_section/showResault',[
        //     'sem1a' => $sem1a , 'sem2a' => $sem2a , 'sem3a' => $sem3a,
        //     'sem1b' => $sem1b , 'sem2b' => $sem2b , 'sem3b' => $sem3b,
        //     'sem1c' => $sem1c , 'sem2c' => $sem2c , 'sem3c' => $sem3c,
        //     'grd_name' => $grd_name , 'name' => $name
        // ]);
    }

    public function addsubjectDisplay()
    {
        return view(('uploading_section/addsubjects'));
    }

    public function addingSubject(Request $request)
    {
        $request-> validate([
            'addSubName'=> 'required'
        ]);
        $request-> validate([
            'addSubCode'=> 'required'
        ]);
        $request-> validate([
            'addGrade'=> 'required|integer|between:1,11',
        ]);

        $addNewSubject = new Subject();
        $addNewSubject -> subjectName = $request->addSubName;
        $addNewSubject -> subjectCode = $request->addSubCode;
        $addNewSubject -> subGrade = $request->addGrade;
        $addNewSubject -> teacher_id = '1' ;
        $addNewSubject -> save();
        return redirect()->back()->with('message', 'Subject Added Successfully');
    }

    public function deletesubjectDisplay()
    {
        $users = DB::table("subjects")
            ->select("*")
            ->get();
        return View('uploading_section/deleteSubject',[
            'users' => $users]);
    }

    public function deleteSubject($subjectCode)
    {
        DB::table("subjects")
            ->select("*")
            ->where("subjectCode", "=", $subjectCode)
            ->delete();
        return redirect()->back()->with('message', 'Subject has been deleted');
    }

    public function markAttendanceDisplay()
    {
        $users = DB::table("users")
            ->select("firstname", "lastname", "requestgrade")
            ->where("usertype", "=", "Student")
            ->get();
        return View('uploading_section/markAttendance',[
            'users' => $users]);
    }

    // mark attendance module view


    public function attendance(Request $request)
    {
        $addGrade = $request->stu_name1;
        $addSubject = $request->stu_name2;

        Session::put('grade', $addGrade);
        Session::put('subject', $addSubject);
 


        $users = DB::table("users")
            ->select("firstName", "lastName", "requestgrade")
            ->where("usertype", "=", "Student")
            ->where("requestgrade", "=", $addGrade)
            ->get();

            // dd($users);

        // $attend = new Attendance();
        // $attend -> student_Name = $request->studName;
        // $attend -> attend = $request->addSubCode;
        // $attend -> subj = $request->addGrade;
        
        return view('uploading_section/markAttendance',[
            'addGrade' => $addGrade , 
            'addSubject' => $addSubject ,
            'users' => $users
        ]);
    }

    public function markingAttendance(Request $request,$addSubject)
    {

        $users = DB::table("users")
            ->select("firstName", "lastName", "requestgrade")
            ->where("usertype", "=", "Student")
            ->where("requestgrade", "=", Session('grade') )
            ->get();

        
        $profil = $request->customRadioInline1;
        
        $attend = new Attendance();
        $attend -> student_Name = $request->studName;
        $attend -> attend = $profil;
        $attend -> subj = $addSubject;
        $attend -> save();

        return view('uploading_section/markAttendance',[
            'addGrade' => Session('grade') , 
            'addSubject' => Session('subject') ,
            'users' => $users
        ]);
    }

    public function showAttendance($addGrade,$addSubject)
    {
        // $atts = DB::table("attendances")
        //     ->where("subj", "=", $addSubject )
        //     ->limit(1)
        //     ->orderBy("created_at",'DESC')
        //     ->get();
        // $atts = DB::table("attendances")
        //             ->select("distinct(student_name)", "attend")
        //             ->where("subj", "=", $addSubject )
        //             // ->groupBy("student_name")
        //             ->get();
        // $atts = DB::table("attendances")
        //     ->selectRAW("student_name", "attend", "id", "max(created_at)")
        //     ->groupBy("student_name")
        //     ->get();

        // $atts = Attendance::selectRAW('max(created_at)','attendances');
        $atts = DB::table('attendances')
            ->select(DB::raw('student_Name, max(created_at),attend'))
            ->where("subj", "=", $addSubject )
            ->groupByRaw('student_Name,attend')
            ->get();


        // $atts = Attendance::select(DB::raw('max(created_at),attendances.*'))->get();
        return view('uploading_section/show_attendance',[
            'addGrade' => $addGrade , 
            'addSubject' => $addSubject ,
            'atts' => $atts
        ]);
    }
}


