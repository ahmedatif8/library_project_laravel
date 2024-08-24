<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/home', [AdminController::class, 'index']);
Route::get('/home/add', [AdminController::class, 'add']);
Route::post('/home/store', [AdminController::class, 'store']);
Route::get('/home/{id}/edit', [AdminController::class, 'edit']);
Route::delete('home/{id}', [AdminController::class, 'destroy']);
Route::put('/home/{id}', [AdminController::class, 'update']);

// Route::get('/home', [StudentController::class, 'index'])->middleware('auth');
Route::post('/books/borrow/{id}', [AdminController::class, 'borrow'])->name('books.borrow')->middleware('auth');
Route::post('/books/return/{id}', [AdminController::class, 'return'])->name('books.return')->middleware('auth');
