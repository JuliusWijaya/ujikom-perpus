<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthenticationController::class, 'index'])->name('login');
Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthenticationController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthenticationController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [AuthenticationController::class, 'dashboard']);
    Route::resource('users', UserController::class);
});
