<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class, 'showSignUp']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// crude
Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::post('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Route pour la redirection vers la page d'emprunt
Route::get('/emprunt', [BookController::class, 'showClientBooks'])->name('client.dashboard');

// Route pour l'emprunt
Route::post('/loans', [BookController::class, 'storeLoan'])->name('loans.store');

Route::get('/', [BookController::class, 'showGeusts']);

Route::get('/borrowed-books', [BookController::class, 'showBorrowedBooks'])->name('borrowed.books');

