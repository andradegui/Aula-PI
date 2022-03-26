<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/product/create', [ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{product}', [ProductController::class,'edit'])->name('product.edit');
Route::put('/product/edit/{product}', [ProductController::class,'update'])->name('product.update');
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::get('/product/trash', [ProductController::class,'trash'])->name('product.trash');
Route::get('/product/trash/restore/{product}', [ProductController::class,'restore'])->name('product.restore');
Route::get('/product/destroy/{product}', [ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/trash', [ProductController::class,'trash'])->name('product.trash');
Route::get('/product/trash/restore/{product}', [ProductController::class,'restore'])->name('product.restore');


Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
Route::post('/category/create', [CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/edit/{category}', [CategoryController::class,'update'])->name('category.update');
Route::get('/category', [CategoryController::class,'index'])->name('category.index');
Route::get('/category/trash', [CategoryController::class,'trash'])->name('category.trash');
Route::get('/category/trash/restore/{category}', [CategoryController::class,'restore'])->name('category.restore');
Route::get('/category/destroy/{category}', [CategoryController::class,'destroy'])->name('category.destroy');
Route::get('/category/restore/{category}', [CategoryController::class,'restore'])->name('category.restore');
Route::get('/category/trash', [CategoryController::class,'trash'])->name('category.trash');

Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag/create', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('/tag/edit/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::get('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
Route::get('/tag/restore/{tag}', [TagController::class, 'restore'])->name('tag.restore');
Route::get('/tag/trash', [TagController::class, 'trash'])->name('tag.trash');
});

Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag/create', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('/tag/edit/{tag}', [TagController::class,'update'])->name('tag.update');
Route::get('/tag/trash', [TagController::class, 'trash'])->name('tag.trash');
Route::get('/tag/trash/restore/{tag}', [TagController::class,'restore'])->name('tag.restore');
Route::get('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

});

