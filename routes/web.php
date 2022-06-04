<?php

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


Route::get('/', function () {
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('registration',[App\Http\Controllers\AuthController::class,'registration'])->name('register');
Route::post('register',[App\Http\Controllers\AuthController::class,'register'])->name('register.post');
Route::get('index',[App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::post("/login",[App\Http\Controllers\AuthController::class,'login'])->name('login.post');


Route::get('forget-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}',[App\Http\Controllers\Auth\ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');