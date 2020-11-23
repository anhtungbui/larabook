<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    if (auth()->check()) {
        return view('home');
    } else {
        return view('welcome');
    }
        
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/profile', 'layouts.base');

// Route::view('/', 'welcome')->middleware('guest');
// Route::view('/', 'home')->middleware('auth');

Route::get('/{user:username}', [ProfileController::class, 'show'])->name('profile');