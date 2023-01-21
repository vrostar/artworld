<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

// User routes
Route::get('/users/profile', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/verify', [UserController::class, 'verifyUser'])->name('users.verify-user');

// Admin routes

Route::middleware(['auth', 'isAdmin'])->group(function() {
    // admin users
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');

    // admin artworks
    Route::post('/artwork/{artwork}/active', [ArtworkController::class, 'toggleActive'])->name('artworks.toggle');
});
Route::resource('/artwork', ArtworkController::class);
Route::resource('/categories', CategoryController::class)->names('categories');


// only verified users can create
// doesnt work cause of resource being public.
// resource being private doesnt allow creation
// dilemma

Route::middleware(['auth', 'isVerified'])->group(function () {
    Route::post('/artwork/create', [ArtworkController::class, 'create'])->name('artworks.create');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/artwork/{artwork}', [App\Http\Controllers\ArtworkController::class, 'show'])->name('artworks.show');
Route::get('/catalogue', [App\Http\Controllers\ArtworkController::class, 'catalogue'])->name('catalogue');
Route::post('/search', [App\Http\Controllers\ArtworkController::class, 'search'])->name('search');
