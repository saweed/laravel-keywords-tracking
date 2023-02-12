<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

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
    return redirect()->route('login');
});

Route::get('/clear-cache', function() {
    Cache::flush();
    \Artisan::call('cache:clear');
    \Artisan::call('optimize');
    \Artisan::call('route:cache');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:cache');

    return 'Application cache has been cleared';
});
Route::get('/demo', [App\Http\Controllers\SearchController::class, 'demo'])->name('demo');
Auth::routes();

Route::get('/dataforseo/result/{id?}/{tag?}', [App\Http\Controllers\SearchController::class, 'taskNotification'])->name('pingback');
Route::post('/dataforseo/result/{id?}/{tag?}', [App\Http\Controllers\SearchController::class, 'taskResult'])->name('postback');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('home')->middleware('auth');

Route::get('/search/add', [App\Http\Controllers\SearchController::class, 'create'])->name('create')->middleware('auth');
Route::post('/search/sotre', [App\Http\Controllers\SearchController::class, 'store'])->name('store')->middleware('auth');
Route::get('/search/list', [App\Http\Controllers\SearchController::class, 'index'])->name('list')->middleware('auth');
Route::get('/search/{id}', [App\Http\Controllers\SearchController::class, 'show'])->name('show')->middleware('auth');
Route::delete('/search/{id}', [App\Http\Controllers\SearchController::class, 'destroy'])->name('destroy')->middleware('auth');
