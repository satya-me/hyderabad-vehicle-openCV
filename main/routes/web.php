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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/camera/settings/view', [App\Http\Controllers\CameraController::class, 'index'])->name('camera');
Route::post('/camera/settings/add', [App\Http\Controllers\CameraController::class, 'add'])->name('camera_add');

Route::get('/report/view', [App\Http\Controllers\HomeController::class, 'report'])->name('report');

// change_pass
Route::get('/setting/password/form', [App\Http\Controllers\HomeController::class, 'password'])->name('change_pass');
Route::post('/setting/password/update', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('post_change_pass');