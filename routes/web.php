<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/postLogin', [LoginController::class, 'postLogin']);
Route::get('/postLogout', [LoginController::class, 'postLogout']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/nestedLoop', [AdminController::class, 'nestedLoop']);

Route::get('/insertLoop', [AdminController::class, 'insertLoop']);
Route::post('/addLoop', [AdminController::class, 'addLoop']);
Route::get('/editLoop/{id}', [AdminController::class, 'editLoop']);
Route::post('/updateLoop/{id}', [AdminController::class, 'updateLoop']);

Route::post('/deleteLoop/{id}', [AdminController::class, 'deleteLoop']);

