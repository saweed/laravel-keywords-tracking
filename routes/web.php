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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('home')->middleware('auth');

Route::get('/search/add', [App\Http\Controllers\SearchController::class, 'create'])->name('create')->middleware('auth');
Route::post('/search/sotre', [App\Http\Controllers\SearchController::class, 'store'])->name('store')->middleware('auth');
Route::get('/search/list', [App\Http\Controllers\SearchController::class, 'index'])->name('list')->middleware('auth');
Route::get('/search/{id}', [App\Http\Controllers\SearchController::class, 'show'])->name('show')->middleware('auth');