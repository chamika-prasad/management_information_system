<?php

namespace App\Http\Controllers;
use App\Models\UploadingContent;
use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Http\Request;

class UploadingContentController extends Controller
{
    public function displaymaterials()
    {

        $Uploadingdummy = new UploadingContent();
        $Uploadingdummy->zoomLink = 'Zoom.link';
        $Uploadingdummy->pdf = 'file.pdf';
        $Uploadingdummy->recordingLink='record Link';
        $Uploadingdummy->subject_id = '1';
        $Uploadingdummy->grade_name = '3';
        $Uploadingdummy-> save();

        $lasts = UploadingContent::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        
        return view('uploading_section/uploading_materials',['lasts' => $lasts , 'gradename'=>$gradename , 'subjectname' => $subjectname]);
    }

    public function displayStudentModuleView()
    {
        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        $gradename = Classroom::latest('created_at')->first();
        $subjectname = Subject::latest('created_at')->first();
        return view('uploading_section/student_ module_view',['Uploadingzooms' => $Uploadingzooms,'recordlink' => $recordlink ,  'pdf'=>$showpdf ,'gradename'=>$gradename , 'subjectname' => $subjectname]);
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
            'createzoomlink'=> 'required | min: 2'

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


    //select module view

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
        
    }
}
