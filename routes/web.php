<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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


// // 🔹 Trasa do weryfikacji e-maila (z `auth`, ale bez `verified`)
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $user = User::findOrFail($request->route('id'));

//     if (!hash_equals(sha1($user->getEmailForVerification()), $request->route('hash'))) {
//         abort(403, 'Nieprawidłowy link weryfikacyjny.');
//     }

//     if (!$user->hasVerifiedEmail()) {
//         $user->markEmailAsVerified();
//     }

//     return redirect('/login')->with('verified', 'E-mail został zweryfikowany! Teraz możesz się zalogować.');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// // 🔹 Trasa do ponownego wysłania linku weryfikacyjnego
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Nowy link weryfikacyjny został wysłany.');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// /*
// |--------------------------------------------------------------------------
// | Ochrona panelu użytkownika (tylko zweryfikowani użytkownicy)
// |--------------------------------------------------------------------------
// */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::get('/users/list', [UserController::class, 'index']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });
    
});
// USER
// Route::get('/users/list', [UserController::class,'index'])->middleware('auth');
// Route::delete('/users/{user}', [UserController::class,'destroy'])->middleware('auth');
//PRODUCTS//
Route::get('/products', [ProductController::class,'index'])->name('products.index')->middleware('can:isAdmin');
Route::get('/products/create', [ProductController::class,'create'])->name('products.create')->middleware('can:isAdmin');
Route::post('/products', [ProductController::class,'store'])->name('products.store')->middleware('can:isAdmin');
Route::get('/products/edit/{product}', [ProductController::class,'edit'])->name('products.edit')->middleware('can:isAdmin');
Route::post('/products/{product}', [ProductController::class,'update'])->name('products.update')->middleware('can:isAdmin');
Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('products.destroy')->middleware('can:isAdmin');
Route::get('/products/{product}', [ProductController::class,'show'])->name('products.show')->middleware('can:isAdmin');
Route::get('/hello', [HelloWorldController::class,'show']);

//BLOG
Route::get('/blog', [BlogController::class,'index'])->name('blog.index')->middleware('can:isAdmin');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create')->middleware('can:isAdmin');
Route::post('/blog', [BlogController::class,'store'])->name('blog.store')->middleware('can:isAdmin');
Route::get('/blog/edit/{blog}', [BlogController::class,'edit'])->name('blog.edit')->middleware('can:isAdmin');
Route::post('/blog/{blog}', [BlogController::class,'update'])->name('blog.update')->middleware('can:isAdmin');
Route::delete('/blog/{blog}', [BlogController::class,'destroy'])->name('blog.destroy')->middleware('can:isAdmin');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show')->middleware('can:isAdmin');



Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
