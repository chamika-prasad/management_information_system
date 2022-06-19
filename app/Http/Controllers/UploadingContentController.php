<?php

namespace App\Http\Controllers;
use App\Models\UploadingContent;
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
        
        return view('uploading_section/uploading_materials',['lasts' => $lasts]);
    }

    public function displayStudentModuleView(Request $request)
    {
        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        return view('uploading_section/student_ module_view',['Uploadingzooms' => $Uploadingzooms,'recordlink' => $recordlink ,  'pdf'=>$showpdf]);
    }

    //send zoom link to the data base

    public function  storezoomlink(Request $request)
    {
        $request-> validate([
            'createzoomlink'=> 'required | min: 2'

        ]);
        $lasts = UploadingContent::latest('created_at')->first();

        $lasts->zoomLink = $request->createzoomlink;
        $lasts->save();

        return view('uploading_section/uploading_materials',['lasts' => $lasts]);
        
    }

        

    //send record link to the database

    public function  storerecord(Request $request)
    {

        $lasts = UploadingContent::latest('created_at')->first();

        $lasts->recordingLink = $request->createrecord;
        $lasts->save();

        return view('uploading_section/uploading_materials',['lasts' => $lasts]);
    }

    //send pdf file to the database


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
                return view('uploading_section/uploading_materials',['lasts' => $lasts]);
            }
            else
            {
                return back()->withInput()->withErrors(['Accepted file types only : "pdf , docx"']);
                // validation failed redirect back to form
            }    
        }
    }
}
