<?php

use App\Http\Controllers\BooksController;

use App\Http\Controllers\uploading_pdfController;
use App\Http\Controllers\FreeLearningController;
use App\Http\Controllers\BankDepositController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AjaxDemoController;


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
Route::get('/uploading_materials/{addGrade}/{addSubject}',[UploadingContentController::class, 'displaymaterials']);
Route::post('uploadmaterials/{addGrade}/{addSubject}',[UploadingContentController::class, 'storematerials']);



//select module view
Route::get('/select_module',[UploadingContentController::class, 'displayModuleSelection']);
Route::get('/findGrade',[UploadingContentController::class, 'findGrade']);

//pdf download
Route::get('/downloadpdf/{pdf}',[UploadingContentController::class,'downloadpdf']);

//teacher module view
Route::post('/submitgradesub',[UploadingContentController::class, 'selectSubjects']);
Route::get('/teacher_module_view',[UploadingContentController::class, 'displaymoduleview']);

//student module view
// Route::get('/student_module_view',[UploadingContentController::class, 'displayStudentModuleView']);
Route::post('/submitgradesubstudent',[UploadingContentController::class, 'displayStudentModuleView']);

//student select subject
Route::get('/selectsubject',[UploadingContentController::class, 'displayStudentselectsubject']);


//Grading view
Route::get('/grading',[UploadingContentController::class, 'gradingview']);
// Route::post('/1stSemUpload',[UploadingContentController::class, 'uploading1stSem']);
// Route::post('/2ndSemUpload',[UploadingContentController::class, 'uploading2ndSem']);
// Route::post('/3rdSemUpload',[UploadingContentController::class, 'uploading3rdSem']);
Route::post('/selectstu',[UploadingContentController::class, 'uploadingStuName']);


//show resault
Route::get('/showResault',[UploadingContentController::class, 'showReasaultDisplay']);


//admin add subjects
Route::get('/addsubjects',[UploadingContentController::class, 'addsubjectDisplay']);
Route::post('/addingnewsubject',[UploadingContentController::class, 'addingSubject']);
Route::get('/deleteSubject',[UploadingContentController::class, 'deletesubjectDisplay']);
Route::delete('/DeleteSub/{subjectCode}',[UploadingContentController::class, 'deleteSubject']);

// Route::get('/search/', [UploadingContentController::class,'search'])->name('search');

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

//serach function//
Route::get('search',[BooksController::class,'search']);


Route::get('studentSerach',[BooksController::class,'studentSerach']);
Route::get('/studentViewPdfs/{id}',[BooksController::class,'studentPdf']);
Route::get('/studentView',[BooksController::class,'studentView']);
/*Route::get('studentHome',function(){
    return view ('studentHome');
});*/

Route::get('/viewBookCategory',[BooksController::class,'viewBookCategory']);

Route::get('/addBooksCategory',[BooksController::class,'addBooksCategory']);//add book category function 
Route::post('/addBooksCategory',[BooksController::class,'storeBookCategory']);//store book Category in database


Route::get('/editDeleteBookCategory',[BooksController::class,'editDeleteBookCategory']);

//edit
Route::get('/editBookCategory/{id}',[BooksController::class,'editBookCategory']);
Route::delete('/DeleteCategory/{category}',[BooksController::class,'deleteCategory']);
Route::put('/updateBooksCategory/{id}',[BooksController::class,'updateBooksCategory']);



Route::get('book-filter',[BooksController::class,'filter'])->name('books.filter');
Route::get('searchCategory',[BooksController::class,'searchCategory']);
Route::get('editBookSerach',[BooksController::class,'editBookSerach'])->name('books.filer.edit');
Route::get('editSearchCategory',[BooksController::class,'editSearchCategory'])->name('booksCategory.filer.edit');
Route::get('studentSearch',[BooksController::class,'studentSearch'])->name('studentSearch.filer');
//--------------------------------------------Ending library mangement system
