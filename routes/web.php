<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TableBookingController;


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

// Route untuk menampilkan halaman login dan register
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/add-table', [TableController::class, 'showAddForm'])->name('add-table');
Route::post('/add-table', [TableController::class, 'addTable'])->name('add-table.submit');

Route::get('/tablebook', [TableBookingController::class, 'create'])->name('tablebook.create');
Route::post('/tablebook', [TableBookingController::class, 'store'])->name('tablebook.store');
Route::post('/tablebook', [TableBookingController::class, 'store'])->name('tablebook.store');










