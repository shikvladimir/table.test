<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

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

Route::resource('product', ProductController::class)
    ->middleware(Authenticate::class);

Route::get('login', [LoginController::class, 'login'])
    ->name('login');

Route::post('login', [LoginController::class, 'checkLogin'])
    ->name('checkLogin');

Route::get('registrationPage',[RegistrationController::class, 'registrationPage'])
    ->name('registrationPage');

Route::post('registrationUser',[RegistrationController::class, 'registrationUser'])
    ->name('registrationUser');
