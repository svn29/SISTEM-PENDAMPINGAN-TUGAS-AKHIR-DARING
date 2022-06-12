<?php

use App\Http\Controllers\JudulController;
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
Route::resource('judul', JudulController::class);
Route::get('/validasi/judul/{id}', [JudulController::class, 'getValidasi'])->name('judul.validasi');
Route::put('/validasi/judul/{id}', [JudulController::class, 'putValidasi'])->name('judul.validasi.put');
