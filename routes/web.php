<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::post('/login', [SessionController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);


Route::get('/welcome', function(){
    return view('welcome');
});
