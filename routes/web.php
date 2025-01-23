<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HelloWOrldController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

//HOME//
Route::get('/', [WelcomeController::class,'index']);
//USER
Route::get('/users/list', [UserController::class,'index'])->middleware('auth');
Route::delete('/users/{user}', [UserController::class,'destroy'])->middleware('auth');
//PRODUCTS//
Route::get('/products', [ProductController::class,'index'])->name('products.index')->middleware('auth');
Route::get('/products/create', [ProductController::class,'create'])->name('products.create')->middleware('auth');
Route::post('/products', [ProductController::class,'store'])->name('products.store')->middleware('auth');
Route::get('/products/edit/{product}', [ProductController::class,'edit'])->name('products.edit')->middleware('auth');
Route::post('/products/{product}', [ProductController::class,'update'])->name('products.update')->middleware('auth');
Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('products.destroy')->middleware('auth');
Route::get('/products/{product}', [ProductController::class,'show'])->name('products.show')->middleware('auth');
Route::get('/hello', [HelloWorldController::class,'show']);

//BLOG
Route::get('/blog', [BlogController::class,'index'])->name('blog.index')->middleware('auth');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create')->middleware('auth');
Route::post('/blog', [BlogController::class,'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/edit/{blog}', [BlogController::class,'edit'])->name('blog.edit')->middleware('auth');
Route::post('/blog/{blog}', [BlogController::class,'update'])->name('blog.update')->middleware('auth');
Route::delete('/blog/{blog}', [BlogController::class,'destroy'])->name('blog.destroy')->middleware('auth');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
