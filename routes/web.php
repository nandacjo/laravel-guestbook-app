<?php

use App\Http\Controllers\GuestBookController;
use App\Http\Middleware\AuthUser;
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
    return view('index');
});



Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();

Route::get('guest-book/edit', [GuestBookController::class, 'edit']);
Route::post('guest-book/update', [GuestBookController::class, 'update']);
Route::resource('guest-book', GuestBookController::class);
