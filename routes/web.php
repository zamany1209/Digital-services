<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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
Route::post('user/login',[LoginController::class, 'login'])->name('user.login');
Route::post('user/register',[LoginController::class, 'register'])->name('user.register');
Route::post('user/logout',[LoginController::class, 'logout'])->name('user.logout');
Route::get('init',[LoginController::class, 'init'])->name('user.init');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
