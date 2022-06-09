<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\uploading_pdfController;
use App\Http\Controllers\FreeLearningController;
use App\Http\Controllers\BankDepositController;
use Illuminate\Support\Facades\Route;
use App\Models\FreeApplication;
use App\Models\User;
use App\Models\Payment;

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

Route::get('online_payment_success/', function () {
    return view ('payment/online_payment_success');
});

Route::get('/admin_free_learning/{user_id}',[FreeLearningController::class, 'adminFreelearning']);


Route::get('/admin_free_learning_list', [FreeLearningController::class, 'displayFreelearningList']);

Route::get('admin_bank_deposite/', function () {
    return view ('payment/admin_bank_deposite_approve');
});

Route::post('submit_free_learning_application/{user_id}', [FreeLearningController::class, 'addFreeLearning']);

Route::get('admin_free_learning_application_action/{action}/{user_id}', [FreeLearningController::class, 'adminFreeLearningAction']);

Route::post('upload_bank_slip/{user_id}', [BankDepositController::class, 'upload']);



Auth::routes();


// Home page routes

Route::get('/footer',function(){
    return view ('home_page/footer');
});

Route::get('/',function(){
    return view ('home_page/home_uploading');
});

// End of home page routes




// starting uploading section

Route::get('/uploading_materials',function(){
    return view ('uploading_section/uploading_materials');
});

Route::get('/uploading_zoomlink',function(){
    return view ('uploading_section/uploading_zoomlink');
});

Route::get('/uploading_pdf',function(){
    return view ('uploading_section/uploading_pdf');
});


Route::get('/uploading_recording',function(){
    return view ('uploading_section/uploading_recording');
});

Route::get('/select_module',function(){
    return view ('uploading_section/select_module');
});

Route::get('/teacher_module_view',function(){
    return view ('uploading_section/teacher_module_view');
});

Route::get('/student_module_view',function(){
    return view ('uploading_section/student_ module_view');
});



// end of uploading section



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
Route::post('/editBooks/{id}',[BooksController::class,'update']);
//'BooksController@edit'

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

