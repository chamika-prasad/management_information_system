<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\QuestionBank;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
 {
    public function displayQuectionAdd( $studentID )
 {
        return view( 'exam_section/Student_Quection_add', [ 'studentID' => $studentID ] );
    }

    public function QuectionAdding( Request $request, $student_id ) {

        $QuestionBank = new QuestionBank();
        $QuestionBank->question_title = $request->title;
        $QuestionBank->question = $request->description;
        $QuestionBank->student_id = $student_id;
        $QuestionBank->save();

        Session::flash( 'message', 'Question added Successfully' );
        $questionLists = QuestionBank::all();
        //get all element in questionbank model
        return view( 'exam_section/Student_Question_Bank_List', [ 'questionLists' => $questionLists, 'studentID' => $student_id ] );

    }

    public function StudentDisplayQuestionList( $studentID ) {

        $questionLists = QuestionBank::all();
        //get all element in questionbank model
        return view( 'exam_section/Student_Question_Bank_List', [ 'questionLists' => $questionLists, 'studentID' => $studentID ] );
    }

    public function teacherDisplayQuestionList( $teacherID ) {

        $questionLists = QuestionBank::all();
        //get all element in questionbank model
        return view( 'exam_section/Teacher_Question_Bank_List', [ 'questionLists' => $questionLists, 'teacherID' => $teacherID ] );
    }

    public function teacherDisplayQuestionview( $question_id, $teacherID ) {

        $user_questions = QuestionBank::where( 'id', $question_id )->first();
        $user_comments = Comment::where( 'question_id', $question_id )->get();
        return view( 'exam_section/Teacher_Question_view', [ 'user_questions' => $user_questions, 'teacherID' => $teacherID, 'user_comments' => $user_comments ] );

    }

    public function studentDisplayQuestionview( $question_id, $studentID ) {

        $user_questions = QuestionBank::where( 'id', $question_id )->first();
        $user_comments = Comment::where( 'question_id', $question_id )->get();
        return view( 'exam_section/Student_view_Question', [ 'user_questions' => $user_questions, 'studentID' => $studentID, 'user_comments' => $user_comments ] );

    }

    public function selectCommentQuestion( $question_id, $teacherID ) {

        $user_questions = QuestionBank::where( 'id', $question_id )->first();
        return view( 'exam_section/Add_Comment', [ 'user_questions' => $user_questions, 'teacherID' => $teacherID ] );

    }

    public function submitcomment( Request $request, $question_id, $teacherID ) {

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->question_id = $question_id;
        $comment->user_id = $teacherID;
        $comment->save();
        $user_questions = QuestionBank::where( 'id', $question_id )->first();
        $user_comments = Comment::where( 'question_id', $question_id )->get();
        Session::flash( 'message', 'Comment added Successfully' );
        return view( 'exam_section/Teacher_Question_view', [ 'user_questions' => $user_questions, 'teacherID' => $teacherID, 'user_comments' => $user_comments ] );
    }
}