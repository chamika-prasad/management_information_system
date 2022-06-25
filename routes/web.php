<?php

use App\Http\Controllers\BooksController;

use App\Http\Controllers\uploading_pdfController;
use App\Http\Controllers\FreeLearningController;
use App\Http\Controllers\BankDepositController;
use App\Http\Controllers\StripeController;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UploadingContentController;

use Illuminate\Support\Facades\Route;
use App\Models\FreeApplication;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Payment;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuizController;
use App\Models\UploadingContent;
use Illuminate\Support\Facades\App;


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

// Registration  routes
Route::get('registration',[AuthController::class,'registration']);
Route::post('/abc', 'App\Http\Controllers\AuthController@register')->name('abc');


//login routes
Route::get('index',[AuthController::class,'index']);
Route::post('/def','App\Http\Controllers\AuthController@login')->name('def');


//show forget password form
Route::get('forgot_password',[ForgotPasswordController::class,'showForgetPasswordForm']);
Route::post('forgot_password',[ForgotPasswordController::class,'submitForgetPasswordForm']);


// show the resetpassword form 
Route::get('reset.password.get/{token}',[ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset.password.post',[ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');

//logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('free_learning_application/', function () {
    return view ('payment/free_learning_application');
});

Route::get('payment_option/', function () {
    return view ('payment/payment_option');
});

Route::get('bank_deposit', function () {
    return view ('payment/bank_deposit');
});

Route::get('upload_success/', function () {
    return view ('payment/upload_success');
});

Route::get('final_amount/', function () {
    return view ('payment/final_amount_online_payment');
});

Route::get('/', function () {
    return view ('welcomehome');
});

Route::get('/selectuser', function () {
    return view ('selectusertype');
});

Route::get('/usertype',[AuthController::class, 'usertype']);


Route::get('online_payment_success/', function () {
    return view ('payment/online_payment_success');
});

Route::get('/admin_free_learning/{user_id}',[FreeLearningController::class, 'adminFreelearning']);


Route::get('/admin_free_learning_list', [FreeLearningController::class, 'displayFreelearningList']);

Route::get('/admin_bank_deposit_list', [BankDepositController::class, 'displayBankDepositList']);


Route::get('/admin_bank_deposite/{user_id}', [BankDepositController::class, 'adminBankdeposit']);

Route::post('submit_free_learning_application/{user_id}', [FreeLearningController::class, 'addFreeLearning']);

// Auth::routes();


Route::get('admin_free_learning_application_action/{action}/{user_id}', [FreeLearningController::class, 'adminFreeLearningAction']);

Route::post('upload_bank_slip/{user_id}', [BankDepositController::class, 'upload']);

Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('/export_pdf', [StripeController::class, 'exportPdf']);

Route::get('/hello',[StripeController::class, 'sendInvoice']);






//----------------------------- Home page routes
Route::get('/home',function()
{
    return view('home');
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
Route::get('/footer',function(){
    return view ('home_page/footer');
});

Route::get('/teacher_home_uploading',function(){
    return view ('home_page/teacher_home_uploading');
});

Route::get('/student_home_uploading',function(){
    return view ('home_page/student_home_uploading');
});

Route::get('/admin_home_uploading',function(){
    return view ('home_page/admin_home_uploading');
});

//-------------------------------- End of home page routes




// -----------------------------starting uploading section



//uploading materials view
Route::get('uploading_materials/{day1}',[UploadingContentController::class, 'displaymaterials']);



//zoom link upload view 
Route::get('/uploading_zoomlink/{day1}',[UploadingContentController::class, 'displayUploadZoom']);
Route::post('uploadZoomlink/{day1}',[UploadingContentController::class, 'storezoomlink']);



//pdf upload view
Route::get('/uploading_pdf/{day1}',[UploadingContentController::class, 'displayUploadPDF']);
Route::post('uploadingPdf/{day1}',[UploadingContentController::class, 'storepdf']);


//record upload view
Route::get('/uploading_recording/{day1}',[UploadingContentController::class, 'displayUploadRecord']);
Route::post('uploadRecording/{day1}',[UploadingContentController::class, 'storerecord']);


//select module view
Route::get('/select_module',function(){
    return view ('uploading_section/select_module');
});
Route::post('/submitgradesub',[UploadingContentController::class, 'selectSubjects']);


//teacher module view
Route::get('/teacher_module_view',[UploadingContentController::class, 'displaymoduleview']);



//student module view
Route::get('/student_module_view',function(){
    return view ('uploading_section/student_ module_view');
});
Route::get('/student_module_view',[UploadingContentController::class, 'displayStudentModuleView']);


//Grading view
Route::get('/grading',[UploadingContentController::class, 'gradingview']);
Route::post('/1stSemUpload',[UploadingContentController::class, 'uploading1stSem']);
Route::post('/2ndSemUpload',[UploadingContentController::class, 'uploading2ndSem']);
Route::post('/3rdSemUpload',[UploadingContentController::class, 'uploading3rdSem']);


//show resault

Route::get('/showResault',[UploadingContentController::class, 'showReasaultDisplay']);

//-------------------------------------------- end of uploading section


//--------------------------------------------Starting library mangement system
// Route::get('/', function () {  
//     return view('welcome');
// });

/*Route::get('/viewBooks', function () {  
    return view('viewBooks');
});*/

//Route::get('/viewBooks','app\Http\Controllers\BooksController@index');
Route::get('/viewBooks',[BooksController::class,'index']);//index function in BooksController


Route::get('/download/{file}',[BooksController::class,'download']);//download book, come from view and go to controller
Route::get('/view/{id}',[BooksController::class,'showPdf']);



/*Route::get('/editBooks', function () { 
    return view('editBooks');
});*/




/*Route::get('/editDelete', function () { 
    return view('editDelete');
});*/
Route::get('editDelete',[BooksController::class,'editDelete']);

//edit
Route::get('/editBooks/{id}',[BooksController::class,'edit']);


//Route::post('/editBooks/{id}',[BooksController::class,'update']);
//'BooksController@edit'
Route::put('/updateBooks/{id}',[BooksController::class,'update']);
/*Route::get('/addBooks', function () {  
    return view('addBooks');
});*/
Route::get('/addBooks',[BooksController::class,'add']);//add book function 
Route::post('/addBooks',[BooksController::class,'store']);//store book in database

//Route::get('/chooseBooks',[BooksController::class,'choose']);
//Route::post('/chooseBooks',[BooksController::class,'storechooseBook']);

//delete book
Route::delete('/Delete/{book}',[BooksController::class,'delete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add_quiz/{subject_id}', [App\Http\Controllers\QuizController::class, 'addQuiz']);

Route::post('/Quection_bank_add/{subject_id}', [App\Http\Controllers\QuestionController::class, 'addQuestion']);





//serach function//
Route::get('search',[BooksController::class,'search']);


Route::get('studentSerach',[BooksController::class,'studentSerach']);
Route::get('/studentViewPdfs/{id}',[BooksController::class,'studentPdf']);
Route::get('/studentView',[BooksController::class,'studentView']);
Route::get('studentHome',function(){
    return view ('studentHome');
});

Route::get('/viewBookCategory',[BooksController::class,'viewBookCategory']);

Route::get('/addBooksCategory',[BooksController::class,'addBooksCategory']);//add book category function 
Route::post('/addBooksCategory',[BooksController::class,'storeBookCategory']);//store book Category in database


Route::get('/editDeleteBookCategory',[BooksController::class,'editDeleteBookCategory']);

//edit
Route::get('/editBookCategory/{id}',[BooksController::class,'editBookCategory']);
Route::delete('/DeleteCategory/{category}',[BooksController::class,'deleteCategory']);
Route::put('/updateBooksCategory/{id}',[BooksController::class,'updateBooksCategory']);


//--------------------------------------------Ending library mangement system
