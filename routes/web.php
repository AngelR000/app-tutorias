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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('store', App\Http\Controllers\TutorController::class);
Route::resource('index', App\Http\Controllers\TutorController::class);
Route::resource('update', App\Http\Controllers\TutorController::class);
Route::resource('destroy', App\Http\Controllers\TutorController::class);

Route::view('/estudiantes', 'estudiantes')->name('estudiantes');