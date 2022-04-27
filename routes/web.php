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
    return view('auth.login');
})->middleware('guest');

Auth::routes();
Route::redirect('home', 'tutores', 301);
Route::get('tutores', [App\Http\Controllers\HomeController::class, 'index'])->name('tutores')->middleware('auth');

Route::resource('store', App\Http\Controllers\TutorController::class);
Route::resource('index', App\Http\Controllers\TutorController::class);
Route::resource('update', App\Http\Controllers\TutorController::class);
Route::resource('destroy', App\Http\Controllers\TutorController::class);

Route::view('estudiantes', 'estudiantes')->name('estudiantes')->middleware('auth');

Route::resource('estudiantes/store', App\Http\Controllers\EstudianteController::class);
Route::resource('estudiantes/index', App\Http\Controllers\EstudianteController::class);
Route::resource('estudiantes/update', App\Http\Controllers\EstudianteController::class);
Route::resource('estudiantes/destroy', App\Http\Controllers\EstudianteController::class);