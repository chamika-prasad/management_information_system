<?php

namespace App\Http\Controllers;

use App\Models\UploadingContent;
use Illuminate\Http\Request;

class UploadingContentController extends Controller
{

    //send zoom link to the data base

    public function  storezoomlink(Request $request)
    {
        $request-> validate([
            'zoomLink'=> 'required | min : 5'

        ]);

        $Uploadingzoomlink = new UploadingContent();
        $Uploadingzoomlink-> zoomLink = $request->createzoomlink;
        $Uploadingzoomlink->pdf = 'file.pdf';
        $Uploadingzoomlink->recordingLink = 'record.link';
        $Uploadingzoomlink->subject_id = '1';
        $Uploadingzoomlink->grade_name = '3';
        $Uploadingzoomlink-> save();

        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        return view('uploading_section/uploading_materials',['Uploadingzooms' => $Uploadingzooms, 'recordlink' => $recordlink , 'pdf'=>$showpdf]);
        
    }

    public function displaymaterials(Request $request)
    {
        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        return view('uploading_section/uploading_materials',['Uploadingzooms' => $Uploadingzooms,'recordlink' => $recordlink ,  'pdf'=>$showpdf]);


    }

    public function displayStudentModuleView(Request $request)
    {
        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        return view('uploading_section/student_ module_view',['Uploadingzooms' => $Uploadingzooms,'recordlink' => $recordlink ,  'pdf'=>$showpdf]);


    }
        

    //send record link to the database

    public function  storerecord(Request $request)
    {

        $UploadingRecord = new UploadingContent();    
        $UploadingRecord->zoomLink = 'zoom.link';
        $UploadingRecord->pdf = 'file.pdf';
        $UploadingRecord-> recordingLink = $request->createrecord;   
        $UploadingRecord->subject_id = '1';
        $UploadingRecord->grade_name = '3';
        $UploadingRecord-> save();

        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        return view('uploading_section/uploading_materials',['Uploadingzooms' => $Uploadingzooms , 'recordlink' => $recordlink ,  'pdf'=>$showpdf]);
    }

    //send pdf file to the database

    public function  storepdf(Request $request)
    {

        $pdfName = $request->file('createPdf')->getClientOriginalName();
        $request->file('createPdf')->store('public/pdfs/');

        $UploadingPdf = new UploadingContent();    
        $UploadingPdf->zoomLink = 'zoom.link';
        $UploadingPdf-> pdf = $pdfName ;
        $UploadingPdf-> recordingLink = 'record.link';   
        $UploadingPdf->subject_id = '1';
        $UploadingPdf->grade_name = '3';
        $UploadingPdf-> save();

        $Uploadingzooms = UploadingContent::latest('created_at')->first();
        $recordlink = UploadingContent::latest('created_at')->first();
        $showpdf = UploadingContent::latest('created_at')->first();
        return view('uploading_section/uploading_materials',['Uploadingzooms' => $Uploadingzooms , 'recordlink' => $recordlink , 'pdf'=>$showpdf]);
    }


}
