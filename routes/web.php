<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard']);
Route::get('/transaction', [App\Http\Controllers\HomeController::class, 'addTransaction'])->name('transaction.get');
Route::post('/transaction', [App\Http\Controllers\HomeController::class, 'storeTransaction'])->name('transaction.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
