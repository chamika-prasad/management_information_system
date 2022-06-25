<?php

use Illuminate\Support\Facades\Route;
use App\Models\FreeApplication;
use App\Models\User;
use App\Models\Payment;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/free_learning_apply', function () {
    return view ('free_learning_application');
});

Route::get('payment_option/', function () {
    return view ('payment_option');
});

Route::get('bank_deposit/', function () {
    return view ('bank_deposit');
});

Route::get('upload_success/', function () {
    return view ('upload_success');
});

Route::get('final_amount/', function () {
    return view ('final_amount_online_payment');
});

Route::get('online_payment_success/', function () {
    return view ('online_payment_success');
});

Route::get('admin_free_learning/', function () {
    return view ('admin_free_learning_approve');
});


// exam routes

// Route::get('/add_exam', function () {
//     return view ('exam_section/add_exam');
// });
Route::get('/add_exam', [App\Http\Controllers\ExamController::class, 'displayExam']);
Route::get('/add_quiz', [App\Http\Controllers\QuizController::class, 'displayquiz']);


Route::get('/add_quiz', function () {
    return view ('exam_section/add_quiz');
});


Route::get('/Graded', function () {
    return view ('exam_section/Graded');
});

Route::get('/exam_student_view', [App\Http\Controllers\ExamController::class, 'studentdisplayExam']);

Route::get('/Submission_exam', function () {
    return view ('exam_section/Submission_exam');
});

Route::get('/Submission_quiz', function () {
    return view ('exam_section/Submission_quiz');
});

Route::get('/Quection_bank_view', function () {
    return view ('exam_section/Quection_bank_view');
});

Route::get('/Quection_bank_add', function () {
    return view ('exam_section/Quection_bank_add');
});

Route::get('/homesection', function () {
    return view ('exam_section/homesection');
});

Route::get('/Quiz_online', function () {
    return view ('exam_section/Quiz_online');
});

Route::get('/Main_view_of_subject', function () {
    return view ('exam_section/Main_view_of_subject');
});

Route::get('/Main_view_of_subject_admin', function () {
    return view ('exam_section/Main_view_of_subject_admin');
});
Route::get('/online_exam', function () {
    return view ('exam_section/online_exam');
});
Route::get('/answer_uploade_student', function () {
    return view ('exam_section/answer_uploade_student');
});

Route::post('/add_exam_details/{subject_id}',[ExamController::class,'addExam']);

Route::get('/view_pepar', [ExamController::class, 'view_pepar'])->name('view_pepar');


// end of exam routes


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add_quiz/{subject_id}', [App\Http\Controllers\QuizController::class, 'addQuiz']);

Route::post('/Quection_bank_add/{subject_id}', [App\Http\Controllers\QuestionController::class, 'addQuestion']);





