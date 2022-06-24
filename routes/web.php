<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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

Route::get('/', [ProductosController::class, 'index'])->name('productos.index');
Route::get('productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('productos/store', [ProductosController::class, 'store'])->name('productos.store');
Route::get('productos/sell/{id}/{status}', [ProductosController::class, 'sell'])->name('productos.sell');
Route::put('productos/soldout', [ProductosController::class, 'soldout'])->name('productos.soldout');
Route::get('productos/edit/{id}/{status}', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('productos/update', [ProductosController::class, 'update'])->name('productos.update');
Route::delete('productos/destroy/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
