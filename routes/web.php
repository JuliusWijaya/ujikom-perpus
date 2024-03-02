<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TrxKembaliController;
use App\Http\Controllers\TrxPinjamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});


Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthenticationController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthenticationController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [AuthenticationController::class, 'dashboard']);
    Route::resource('users', UserController::class);
    Route::resource('anggotas', AnggotaController::class);
    Route::resource('koleksis', KoleksiController::class);
    Route::resource('pinjams', TrxPinjamController::class);
    Route::resource('kembalis', TrxKembaliController::class);
    Route::resource('laporans', LaporanController::class);
});
