<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

// Route::get('/file-import',[UserController::class,'importView'])->name('import-view');
// Route::post('/import',[UserController::class,'import'])->name('import');
// Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');



Route::get('/file-product-import',[ProductController::class,'importProductView'])->name('file-product-import');
Route::post('/import-products',[ProductController::class,'importproduct'])->name('import-products');
Route::get('/export-products',[ProductController::class,'exportProducts'])->name('export-products');


Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
