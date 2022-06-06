<?php

use App\Http\Controllers\BooksController;
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

Route::get('bank_deposit/', function () {
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

Route::get('admin_free_learning/', function () {
    return view ('payment/admin_free_learning_approve');
});

Route::get('admin_free_learning_list/', function () {
    return view ('payment/admin_free_learning_application_list');
});

Route::get('admin_bank_deposite/', function () {
    return view ('payment/admin_bank_deposite_approve');
});

Auth::routes();

