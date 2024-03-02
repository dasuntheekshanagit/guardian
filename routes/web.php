<?php

use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserdetailsController;
use App\Http\Controllers\DrugController;
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

Route::get('/', [UserController::class, 'index'])->name('dashboard');

Route::get('/signup', [SignUpController::class, 'index'])->name('signup.index');
Route::post('/signup', [SignUpController::class, 'register'])->name('signup.create');

Route::get('/signin', [SignInController::class, 'index'])->name('signin.index');
Route::post('/signin', [SignInController::class, 'authenticate'])->name('signin.authenticate');
Route::get('/signout', [SignInController::class, 'signout'])->name('signin.signout');

Route::get('/details', [UserdetailsController::class, 'index'])->name('signup.userdetails');
Route::post('/details', [UserdetailsController::class, 'store'])->name('signup.details');

Route::get('/add', [PrescriptionController::class, 'index'])->name('preceptcard');
Route::post('/add', [PrescriptionController::class, 'store'])->name('preceptcard.store');
Route::get('/prescription/{id}', [PrescriptionController::class, 'show'])->name('prescription.show');
Route::post('/prescription/{id}/quotations', [PrescriptionController::class, 'quatation'])->name('prescription.quatation');
Route::get('/prescriptions/{id}/quotations', [PrescriptionController::class, 'getQuotationDetails']);
Route::post('/prescriptions/{id}/accept', [PrescriptionController::class, 'acceptQuotation'])->name('acceptQuotation');

Route::get('/drugs', [DrugController::class, 'index']);
Route::post('/drugs', [DrugController::class, 'store']);
Route::delete('/drugs/{id}', [DrugController::class, 'destroy']);