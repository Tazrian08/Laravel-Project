<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

//user Routes:

Route::get('/loginpage',[UserController::class, 'log_direct']);

Route::get('/registerpage',[UserController::class, 'reg_direct']);

Route::post('/register',[UserController::class, 'register']);

Route::get('/logout',[UserController::class, 'logout']);

Route::post('/login',[UserController::class, 'login']);

Route::get('/profile/{user}',[UserController::class, 'profile']);




//Product Routes:
Route::get('/postpage',[ProductController::class, 'post_direct']);

Route::post('/post',[ProductController::class, 'post']);

Route::get('/index',[ProductController::class, 'index']);

Route::get('/search', [ProductController::class, 'search']);

Route::get('/prodpage/{product}',[ProductController::class, 'prodpage']);

//Edit and Delete Routes:

Route::get('/edit/{product}',[EditController::class, 'edit']);

Route::put('/edit/{product}',[EditController::class, 'update']);

Route::delete('/delete/{product}',[EditController::class, 'deleteprod']);

Route::get('/update/{user}',[EditController::class, 'change']);

Route::put('/update/{user}',[EditController::class, 'userUpdate']);




