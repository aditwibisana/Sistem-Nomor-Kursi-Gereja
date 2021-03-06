<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
Route::get('/setpassword', [App\Http\Controllers\GoogleController::class, 'setPassword']);
Route::get('/daftar', [App\Http\Controllers\DashboardController::class, 'daftar']);
Route::get('/ibadah/{id}/daftar', [App\Http\Controllers\DashboardController::class, 'ibadahDaftar']);
Route::get('/contoh', [App\Http\Controllers\DashboardController::class, 'contoh']);
Route::post('/proses', [App\Http\Controllers\DashboardController::class, 'prosesDaftar']);
