<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [GuestController::class, 'showGuestForm'])->name('home');

// Route::get('login', function () {
//     return view('layouts.pages.auth.login');
// })->name('auth.login.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login.show');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/sign-up',[LoginController::class, 'showSignUpForm'])->name('auth.sign-up.show');
Route::post('/register',[LoginController::class,'register'])->name('auth.register');
// Route::get('/logout', [LoginController::class], 'logout')->name('auth.logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Route::get('sign-up', function() {
//     return view('layouts.pages.auth.sign-up');
// })->name('auth.sign-up.show');

Route::get('discussions', function() {
    return view('layouts.pages.discussions.index');
})->name('discussions.index');

Route::get('discussions/lorem', function() {
    return view('layouts.pages.discussions.show');
})->name('discussions.show');

Route::get('discussions/create', function() {
    return view('layouts.pages.discussions.form');
})->name('discussions.create');

Route::get('answers/1', function() {
    return view('layouts.pages.answers.form');
})->name('answers.edit');

Route::get('users/reinalddy', function() {
    return view('layouts.pages.users.show');
})->name('users.show');

Route::get('users/reinalddy/edit', function() {
    return view('layouts.pages.users.form');
})->name('users.edit');
