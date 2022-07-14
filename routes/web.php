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
Route::get('/',[AuthController::class,'registration']);
//Route::post('abc',[AuthController::class,'register'])->name('abc');
Route::post('/abc', 'App\Http\Controllers\AuthController@register')->name('abc');

Route::get('index',[AuthController::class,'index']);
// Route::post('/login','App\Http\Controllers\AuthController@login')->name('login');
Route::post('/def','App\Http\Controllers\AuthController@login')->name('def');;


Route::get('forgot_password',[ForgotPasswordController::class,'showForgetPasswordForm']);
Route::post('forgot_password',[ForgotPasswordController::class,'submitForgetPasswordForm']);
Route::get('reset.password.get/{token}',[ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset.password.post',[ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard']);

// Route::get('/free_learning_application/{$id}', [FreeLearningController::class, 'userfreelearningView']);

Route::get('payment_option/', function () {
    return view ('payment/payment_option');
});

Route::get('/free_learning_application', function () {
    return view ('payment/free_learning_application');
});



Route::get('/bank_deposit', function () {
    return view ('payment/bank_deposit');
});

Route::get('upload_success/', function () {
    return view ('payment/upload_success');
});

Route::get('final_amount/', function () {
    return view ('payment/final_amount_online_payment');
});

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






//----------------------------- Home page routes

Route::get('/footer',function(){
    return view ('home_page/footer');
});

Route::get('/student/{id}', [FreeLearningController::class, 'userView']);

//return view ('home_page/student_home_uploading');

Route::get('/teacher',function(){
    return view ('home_page/teacher_home_uploading');
});

Route::get('/admin',function(){
    return view ('home_page/admin_home_uploading');
});

//-------------------------------- End of home page routes




// -----------------------------starting uploading section



//uploading materials view
Route::get('/uploading_materials',[UploadingContentController::class, 'displaymaterials']);


//zoom link upload view 
Route::get('/uploading_zoomlink',[UploadingContentController::class, 'displayUploadZoom']);
Route::post('uploadZoomlink',[UploadingContentController::class, 'storezoomlink']);


//pdf upload view
Route::get('/uploading_pdf',[UploadingContentController::class, 'displayUploadPDF']);
Route::post('uploadingPdf',[UploadingContentController::class, 'storepdf']);


//record upload view
Route::get('/uploading_recording',[UploadingContentController::class, 'displayUploadRecord']);
Route::post('uploadRecording',[UploadingContentController::class, 'storerecord']);


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



//-------------------------------------------- end of uploading section



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

