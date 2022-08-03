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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::view('create','createpost')->name('storepost');
Route::view('subscribe','subscribe')->name('subscribe');
Route::post('storepost',[App\Http\Controllers\PostController::class,'store'])->name('storepost');
Route::post('subscribe',[App\Http\Controllers\PostController::class,'subscribe'])->name('subscribe');
