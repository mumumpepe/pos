<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
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


Route::get('/sales', function(){
    return view('dashboard.sales');
});
Route::get('/index', function() {
    return view('dashboard.index');
});
Route::get('/blank', function() {
    return view('dashboard.blank');
});

Route::get('/tables', [SalesController::class, 'index']);

Route::get('/tabs', function() {
    return view('dashboard.tabs');
});
Route::get('/calendar', function() {
    return view('dashboard.calendar');
});


Route::post('/sale', [SalesController::class, 'store']);


Route::get('/admin/dashboard', function() {
    return view('admin.index');
});

Route::get('/admin/sales', [AdminController::class, 'sales']);

Route::get('/admin/blank', [AdminController::class, 'users']);

Route::get('/sale/{sale}/edit', [SalesController::class, 'edit']);
Route::patch('/sales/{sale}', [SalesController::class, 'update']);
Route::delete('/sales/{sale}', [SalesController::class, 'destroy']);

Route::get('/admin/register', function() {
    return view('admin.register');
});

Route::get('/admin/calendar', function() {
    return view('admin.calendar');
});

Route::get('/admin/tables', function() {
    return view('admin.tables');
});

Route::get('/admin/tabbed', function() {
    return view('admin.tabs');
});

Route::get('/edit/user', [UserController::class, 'edit']);
