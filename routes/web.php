<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentDetailsController;
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
Route::get('/', [RentController::class, 'home']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/login/post', [AuthController::class, 'loginInput'])->name('login.post');
Route::post('/register/post', [AuthController::class, 'registerPost'])->name('register.post');


Route::get('/car/edit/{id}', [CarController::class, 'edit']);
Route::post('/car/update/{id}', [CarController::class, 'update'])->name('car.update');
Route::get('/car/create', [CarController::class, 'create']);
Route::post('/car/post', [CarController::class, 'store'])->name('car.store');
Route::get('/car', [CarController::class, 'index']);
Route::post('/car/delete/{id}', [CarController::class, 'destroy']);

Route::get('/rent/create', [RentController::class, 'create']);
Route::post('/rent/post', [RentController::class, 'store'])->name('rent.post');

