<?php

use Illuminate\Support\Facades\Route;
use App\Models\FreeApplication;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
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
Route::get('registration',[AuthController::class,'registration']);
//Route::post('abc',[AuthController::class,'register'])->name('abc');
Route::post('/abc', 'App\Http\Controllers\AuthController@register')->name('abc');

Route::get('index',[AuthController::class,'index']);
// Route::post('/login','App\Http\Controllers\AuthController@login')->name('login');
Route::post('/def','App\Http\Controllers\AuthController@login')->name('def');


Route::get('forgot_password',[ForgotPasswordController::class,'showForgetPasswordForm']);
Route::post('forgot_password',[ForgotPasswordController::class,'submitForgetPasswordForm']);
Route::get('reset.password.get/{token}',[ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset.password.post',[ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard']);

Route::get('/', function () {
   return view ('free_learning_application');
});

// Route::get('payment_option/', function () {
//     return view ('payment_option');
// });

// Route::get('bank_deposit/', function () {
//     return view ('bank_deposit');
// });

// Route::get('upload_success/', function () {
//     return view ('upload_success');
// });

// Route::get('final_amount/', function () {
//     return view ('final_amount_online_payment');
// });

// Route::get('online_payment_success/', function () {
//     return view ('online_payment_success');
// });

// Route::get('admin_free_learning/', function () {
//     return view ('admin_free_learning_approve');
// });

// Auth::routes(); 



