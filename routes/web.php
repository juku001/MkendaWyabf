<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/registration/waiting/{user_id}', [RegistrationController::class, 'waiting'])->name('registration.waiting');
Route::get('/registration/payment-status/{user_id}', [RegistrationController::class, 'checkPaymentStatus']);


Route::get('/registration/payment/{user_id}', [RegistrationController::class, 'tanzaniaPayment'])->name('registration.payment');
Route::get('/registration/non_payment/{user_id}', [RegistrationController::class, 'nonTanzaniaPayment'])->name('registration.non.payment');
Route::get('/registration/paid', [RegistrationController::class, 'paid'])->name('registration.paid');


Route::post('/pay/mobile', [PaymentController::class, 'mobile'])->name('payment.mobile');
Route::post('/pay/card', [PaymentController::class, 'card'])->name('payment.card');
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('callback');