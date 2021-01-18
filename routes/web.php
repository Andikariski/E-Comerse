<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/viewProduct', [ProductController::class, 'viewProduct'])->name('viewProduct');

#path untuk menampilkan data
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');

#path post untuk menginsert data
Route::post('/store', [ProductController::class, 'store']);

#path delete untuk mengapus data
Route::patch('/prosesUpdate/{id}', [ProductController::class, 'prosesUpdate']);

#path delete untuk mendelete
Route::delete('/delete/{id}', [ProductController::class, 'delete']);
