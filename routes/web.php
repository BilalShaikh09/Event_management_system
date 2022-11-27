<?php

use App\Http\Controllers\ForgotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return view('welcome');
});

// Login route 
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'check']);
// Register route
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login/forgot',[ForgotController::class,'forgot']);
Route::post('/login/forgot',[ForgotController::class,'verifyemail']);

Route::get('/login/forgot/reset/{email}',function(){
    return view('Password.reset');
});

Route::get('/home',function(){
    return view('home');
});