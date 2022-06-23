<?php

namespace App\Http\Controllers;
use App\Models\UploadingContent;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\GradeSemThree;
use App\Models\GradeSemtwo;
use Illuminate\Http\Request;

class UploadingContentController extends Controller
{
    public function displaymaterials()
    {

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();

        $Uploadingdummy = new UploadingContent();
        $Uploadingdummy->zoomLink = 'Zoom.link';
        $Uploadingdummy->pdf = 'file.pdf';
        $Uploadingdummy->recordingLink='record Link';
        $Uploadingdummy->subject_id = '1';
        $Uploadingdummy->grade_name = '3';
        $Uploadingdummy-> save();

        $lasts = UploadingContent::latest('created_at')->first();
       
        
        return view('uploading_section/uploading_materials',['lasts' => $lasts , 'gradename'=>$gradename , 'subjectname' => $subjectname]);
    }

    public function displayStudentModuleView()
    {
        $lasts = UploadingContent::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        return view('uploading_section/student_ module_view',['lasts' => $lasts ,'gradename'=>$gradename , 'subjectname' => $subjectname]);
    }

    //send zoom link to the data base

    public function displayUploadZoom()
    {
        $subjectname = Subject::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        return view('uploading_section/uploading_zoomlink',['subjectname' => $subjectname , 'gradename'=>$gradename]);
    }

    public function  storezoomlink(Request $request)
    {
        $request-> validate([
            'createzoomlink'=> 'required|url'

        ]);
    
        $lasts = UploadingContent::latest('created_at')->first();

        $lasts->zoomLink = $request->createzoomlink;
        $lasts->save();
        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();

        return view('uploading_section/uploading_materials',['lasts' => $lasts ,'gradename'=>$gradename , 'subjectname' => $subjectname]);
        
    }

        

    //send record link to the database

    public function displayUploadRecord()
    {
        $subjectname = Subject::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        return view('uploading_section/uploading_recording',['subjectname' => $subjectname , 'gradename'=>$gradename]);
    }

    public function  storerecord(Request $request)
    {

        $lasts = UploadingContent::latest('created_at')->first();
        $request-> validate([
            'createrecord'=> 'required|url'

        ]);

        $lasts->recordingLink = $request->createrecord;
        $lasts->save();
        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();

        return view('uploading_section/uploading_materials',['lasts' => $lasts , 'gradename'=>$gradename , 'subjectname' => $subjectname]);
    }

    //send pdf file to the database

    public function displayUploadPDF()
    {
        $subjectname = Subject::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        return view('uploading_section/uploading_pdf',['subjectname' => $subjectname , 'gradename'=>$gradename]);
    }


    public function  storepdf(Request $request){

        $lasts = UploadingContent::latest('created_at')->first();
        
        $err = $request-> validate([
            'createPdf'=> 'required'

        ]);

        if($err == 'required')
        {
            return back()->withInput();
        }
        else
        {
            $pdfName = $request->file('createPdf')->getClientOriginalName();
            $extentionpdf = $request->file('createPdf')->getClientOriginalExtension();
            $request->file('createPdf')->store('public/pdfs/');
            if ($extentionpdf=='pdf' || $extentionpdf == 'docx')   //check all validations are fine, if not then redirect and show error messages
            {
                $lasts->pdf = $pdfName;
                $lasts->save();
                $gradename = Classroom::latest('created_at')->first();
                $subjectname = Subject::latest('created_at')->first();
                return view('uploading_section/uploading_materials',['lasts' => $lasts ,'gradename'=>$gradename , 'subjectname' => $subjectname]);
            }
            else
            {
                return back()->withInput()->withErrors(['Accepted file types only : "pdf , docx"']);
                // validation failed redirect back to form
            }    
        }
    }


    //teacher module view

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

        $day=strtotime("next Sunday");
        $date =  date('Y M d ' , $day);

        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        $lasts = UploadingContent::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',['lasts' => $lasts,'gradename'=>$gradename , 'subjectname' => $subjectname , 'date' => $date]);
    }


    public function displaymoduleview()
    {
        $day=strtotime("next Sunday");
        $date =  date('Y M d ' , $day);

        $lasts = UploadingContent::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        return view('uploading_section/teacher_module_view',['lasts' => $lasts ,'subjectname' => $subjectname , 'gradename'=>$gradename , 'date' => $date]);
    }


    //grading view

    public function gradingview()
    {
        return view('uploading_section/grading',['semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree, 'tot'=> $this-> tot]);
    }

    private $semOne ,$semTwo,$semThree,$tot;

    public function uploading1stSem(Request $request)
    {
        $err = $request-> validate([
            'markBudhdhaCharithaya'=> 'required'

        ]);

        $err = $request-> validate([
            'markPali'=> 'required'

        ]);

        $err = $request-> validate([
            'markAbhi'=> 'required'

        ]);

        $err = $request-> validate([
            'markAssignment'=> 'required'

        ]);

        if($err == 'required')
        {
            return redirect()->back();
        }
        else
        {
            $sem1 = new Grade();
            $sem1 -> semOneBudhdha = $request->markBudhdhaCharithaya;
            $sem1 -> semOnePali = $request->markPali;
            $sem1 -> semOneAbhi = $request->markAbhi;
            $sem1 -> semOneAssignment = $request->markAssignment;
            $sem1 -> student_id = '1' ;
            $this-> semOne = $sem1 -> semOneBudhdha + $sem1 -> semOnePali +  $sem1 -> semOneAbhi + $sem1 -> semOneAssignment;
            $sem1 -> save();
            return view('uploading_section/grading',['semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree , 'tot'=> $this-> tot]);
        }
    }

    public function uploading2ndSem(Request $request)
    {
        $err = $request-> validate([
            'markBudhdhaCharithaya'=> 'required'

        ]);

        $err = $request-> validate([
            'markPali'=> 'required'

        ]);

        $err = $request-> validate([
            'markAbhi'=> 'required'

        ]);

        $err = $request-> validate([
            'markAssignment'=> 'required'

        ]);

        if($err == 'required')
        {
            return redirect()->back();
        }
        else
        {
            $sem1 = new GradeSemtwo();
            $sem1 -> semTwoBudhdha = $request->markBudhdhaCharithaya;
            $sem1 -> semTwoPali = $request->markPali;
            $sem1 -> semTwoAbhi = $request->markAbhi;
            $sem1 -> semTwoAssignment = $request->markAssignment;
            $sem1 -> student_id = '1' ;
            $this-> semTwo = $sem1 -> semTwoBudhdha + $sem1 -> semTwoPali +  $sem1 -> semTwoAbhi + $sem1 -> semTwoAssignment;
            $sem1 -> save();
            return view('uploading_section/grading',['semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree , 'tot'=> $this-> tot]);
        }
        
    }

    public function uploading3rdSem(Request $request)
    {
        $err = $request-> validate([
            'markBudhdhaCharithaya'=> 'required'

        ]);

        $err = $request-> validate([
            'markPali'=> 'required'

        ]);

        $err = $request-> validate([
            'markAbhi'=> 'required'

        ]);

        $err = $request-> validate([
            'markAssignment'=> 'required'

        ]);

        if($err == 'required')
        {
            return redirect()->back();
        }
        else
        {
            $sem1 = new GradeSemThree();
            $sem1 -> semThreeBudhdha = $request->markBudhdhaCharithaya;
            $sem1 -> semThreePali = $request->markPali;
            $sem1 -> semThreeAbhi = $request->markAbhi;
            $sem1 -> semThreeAssignment = $request->markAssignment;
            $sem1 -> student_id = '1' ;
            $this-> semThree = $sem1 -> semThreeBudhdha + $sem1 -> semThreePali +  $sem1 -> semThreeAbhi + $sem1 -> semThreeAssignment;
            $sem1 -> save();
            return view('uploading_section/grading',['semOne' => $this-> semOne,'semTwo' =>  $this->semTwo,'semThree' =>  $this-> semThree , 'tot'=> $this-> tot]);
        }
        
    }

    public function showReasaultDisplay()
    {

        $sem1 = Grade::latest('created_at')->first();
        $sem2 = GradeSemtwo::latest('created_at')->first();
        $sem3 = GradeSemThree::latest('created_at')->first();


        return view('uploading_section/showResault',['sem1' => $sem1 , 'sem2' => $sem2 , 'sem3' => $sem3]);
    }

}
