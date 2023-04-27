<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;

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
    return view('home');
});

Route::get('/register', function () {
    return view('register.index');
});

Route::get('/about', [AboutController::class, 'index'])->middleware('auth');




// Login Route
Route::match(['get', 'post'], '/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/register', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Login Route

// Log Out
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout']);
// Log Out

// Users

// Users


Route::post('register', [RegisterController::class, 'store']);


Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/item', ItemController::class)->middleware('auth');;
Route::resource('/transaction', TransactionController::class)->middleware('auth');
Route::resource('/profil', ProfilController::class)->middleware('auth');
