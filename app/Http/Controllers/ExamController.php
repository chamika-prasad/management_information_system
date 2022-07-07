<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\answer;
use Session;
use PDF;

class ExamController extends Controller
 {

    public function studentdisplayExam()
 {
        // $message = 'uploaded Successfully';
        return view ( 'exam_section/exam_student_view' );
    }

    public function studentuploadeanswer()
 {

        // $message = 'uploaded Successfully';
        return view ( 'exam_section/exam_student_view' );
    }

    public function view_pepar()
 {

    }

    public function sendsubgrade( Request $request ) {

        return view( 'exam_section/add_exam', [ 'request' => $request ] );

    }

    public function diplayexam( Request $request ) {

        return view( 'exam_section/add_exam', [ 'request' => $request ] );

    }

    public function addexamdetails( Request $request,$grade,$subject )
 {

        $request->validate( [
            'description' => 'required',
            'uploadpdf' => 'required|mimes:pdf',
            'reqdate' => 'required',
            'guidline' => 'required',

        ] );

        // $timestamp = (strtotime($request->reqdate));
        // $date1 = date('Y-m-d', $timestamp);
        // $time = date('H:i:s', $timestamp);

        // // dd($date,$time);

        // $current = Carbon::now();
        // $datetime = $current->format('d-M-Y H:i:s');
        // // dd($datetime);
        // $time = $current->format('H:i:s');
        // $date2 = $current->format('Y-m-d');

        // if($date1==$date2){
        //     dd('equal');
        // }elseif($date1>$date2) {
        //     dd('upcomming');
        // }elseif ($date1<$date2) {
        //     dd('finished');
        // }

        // dd($date,$time);

        // $exten = $request->file('image')->getClientOriginalExtension();
        // $request->file('image')->storeAs('public/images/',$name);

        $addingNewExam = new Exam();
        $file = $request->uploadpdf;
        $name = $file->getClientOriginalName();
        $extantion = $file->getClientOriginalExtension();
        $request->file( 'uploadpdf' )->storeAs( 'public/pdf-folder/exam/', $name);

        $addingNewExam -> description_about_exam = $request->description;
        $addingNewExam -> add_exam_paper = $name;
        $addingNewExam -> date_and_time = $request->reqdate;
        $addingNewExam -> guidline = $request->guidline;
        $addingNewExam -> teacher_id = '12';
        $addingNewExam -> subject_id = $subject;
        $addingNewExam ->isfinished = 0;
        $addingNewExam -> grade = $grade;
        $addingNewExam -> save();

        return view( 'test' );
    }

    public function download( $file )
 {
        //return Storage::download( $file );
        return response()->download( storage_path( 'app/public/pdf-folder/answer/'. $file ) );
    }

    public function views( $file )
 {
        //return Storage::download( $file );
        return response()->file( storage_path( 'app/public/pdf-folder/answer/'. $file ) );

    }

    public function teacherShowExamlist(Request $request) {


        $exams = DB::table('exams')
                ->where('subject_id', '=', $request->selectSubject)
                ->get();

                // dd($exams);

        $i=0;
        $j=0;
        $k=0;
        $today = array();
        $upcomming = array();
        $finish = array();

        $results = json_decode($exams, true);

        $current = Carbon::now();
        $datetime = $current->format('d-M-Y H:i:s');
        $time = $current->format('H:i');
        $date = $current->format('Y-m-d');

        foreach ($results as $result) {

            $timestamp = (strtotime($result['date_and_time']));
            $examdate = date('Y-m-d', $timestamp);

            if($examdate == $date){

                $today[$i] = $result;
                $i++;

            }elseif($examdate < $date){

                $finish[$j] = $result;
                $j++;

            }elseif($examdate > $date){

                $upcomming[$k] = $result;
                $k++;

            }
            
                
        }

       return view('exam_section/Teacher_show_exam_list',['today' => $today, 'finish' => $finish, 'upcomming' => $upcomming]);
        

    }


    public function showtodayexamdetails($id){

        $exam = exam::where('id',$id)->first();
        // dd($exam);

        // dd($exam->description_about_exam);

        return view('exam_section/today_exam_teacher_view',['exam' => $exam]);

    }

    public function showupcomingexamdetails($id){

        $exam = exam::where('id',$id)->first();
        // dd($exam);

        // dd($exam->description_about_exam);

        return view('exam_section/upcoming_exam_teacher_view',['exam' => $exam]);

    }

    public function showfinishexamdetails($id){

        $exam = exam::where('id',$id)->first();
        // dd($exam);

        // dd($exam->description_about_exam);

        return view('exam_section/finish_exam_teacher_view',['exam' => $exam]);

    }


    public function endexam($id){

        $exam = exam::where('id',$id)->first();

        $exam->isfinished = 1;
        $exam->save();

        return view('exam_section/exam_teacher_view',['exam' => $exam]);

        
    }



    public function studentShowExamlist(Request $request,$id) {


        $exams = DB::table('exams')
                ->where('subject_id', '=', $request->selectSubject)
                ->get();

        $todayexams = DB::table('exams')
                     ->where('subject_id', '=', $request->selectSubject)
                     ->where('isfinished', '=', 1)
                     ->get();

                // dd($exams);

        $i=0;
        $j=0;
        $k=0;
        $today = array();
        $upcomming = array();
        $finish = array();

        $results = json_decode($exams, true);
        $todayresults = json_decode($todayexams, true);

        $current = Carbon::now();
        $datetime = $current->format('d-M-Y H:i:s');
        $time = $current->format('H:i');
        $date = $current->format('Y-m-d');

        foreach ($results as $result) {

            $timestamp = (strtotime($result['date_and_time']));
            $examdate = date('Y-m-d', $timestamp);

            if($examdate < $date){

                $finish[$j] = $result;
                $j++;

            }elseif($examdate > $date){

                $upcomming[$k] = $result;
                $k++;

            }               
        }

        foreach ($todayresults as $todayresult){

            $timestamp = (strtotime($todayresult['date_and_time']));
            $examdate = date('Y-m-d', $timestamp);

            if($examdate == $date){

                $today[$i] = $result;
                $i++;

            }

        }

       return view('exam_section/Student_show_exam_list',['today' => $today, 'finish' => $finish, 'upcomming' => $upcomming,'id' => $id,'subject' => $request->selectSubject]);
        

    }


    public function studentshowtodayexamdetails($examid,$studentid){

        $exam = exam::where('id',$examid)->first();
        // dd($exam);

        // dd($exam->description_about_exam);

        return view('exam_section/today_exam_student_view',['exam' => $exam,'studentid' => $studentid]);

    }  


    public function addexamsubmission(Request $request,$examid,$studentid){

        $addanswer = new answer();
        $file = $request->answer;
        $name = $file->getClientOriginalName();
        $extantion = $file->getClientOriginalExtension();
        $request->file( 'answer' )->storeAs( 'public/pdf-folder/answer/', $name );

        $addanswer->answer=$name;
        $addanswer->examid=$examid;
        $addanswer->student_id=$studentid;
        $addanswer-> save();
        return view( 'test' );


    }

    public function showanswers($examid){

        $showanswers = answer::where('examid',$examid)->get();

        $i=0;
        $answers = array();

        foreach($showanswers as $showanswer){

            $answers[$i]['id'] = $i+1;
            $answers[$i]['marks'] = $showanswer-> marks;
            $answers[$i]['answer'] = $showanswer-> answer;
            $answers[$i]['student_id'] = $showanswer-> student_id ;
            $i++;
        }

        return view('exam_section/show_answer_sheet',['answers' => $answers]);

    }

    public function addmark(Request $request,$answerid){

        // dd($request,$answerid);

        $addmark = answer::where('id',$answerid)->first();
        $addmark->marks = $request->mark;
        $addmark->save();
        return view( 'test' );

    }

}

