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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

