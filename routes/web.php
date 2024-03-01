<?php

use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UserdetailsController;
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
    return view('dashboard');
})->name('dashboard');

Route::get('/signup', [SignUpController::class, 'index'])->name('signup.index');
Route::post('/signup', [SignUpController::class, 'register'])->name('signup.create');

Route::get('/signin', [SignInController::class, 'index'])->name('signin.index');
Route::post('/signin', [SignInController::class, 'authenticate'])->name('signin.authenticate');
Route::get('/signout', [SignInController::class, 'signout'])->name('signin.signout');

Route::get('/details', [UserdetailsController::class, 'index'])->name('signup.userdetails');
Route::post('/details', [UserdetailsController::class, 'store'])->name('signup.details');