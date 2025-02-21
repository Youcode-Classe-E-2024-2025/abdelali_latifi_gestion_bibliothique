<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterController;
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


Route::get('/',[authController::class,'index']);
Route::get('/login',[loginController::class,'login'])->name('login');
Route::get('registre',[authController::class,'registre']);
Route::get('/home',[authController::class,'home']);
Route::post('registre',[RegisterController::class,'registre'])->name('register');
Route::post('/login',[loginController::class,'login'])->name('login');
Route::get('/login',[loginController::class,'login'])->name('login');

