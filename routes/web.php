<?php

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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
//    Route::get('/authors', [\App\Http\Controllers\Auth\LoginController::class, 'showAuthor']);
    Route::resource('authors', \App\Http\Controllers\AuthorController::class);
    Route::resource('books', \App\Http\Controllers\BookController::class);

    Route::get('/', function () {
        return redirect('/login');
    })->name(
        'home'
    );
});

