<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [WelcomeController::class, 'homePage']);
Route::get('/blog/{uniqueIdentifier}', [WelcomeController::class, 'show']);
Route::get('/fetch-images/{imageFile}', [ImageController::class, 'blogImage']);
Route::controller(AuthenController::class)->group(function(){
    Route::get('/registration','registration')->middleware('alreadyLoggedIn');
    Route::post('/registration-user','registerUser')->name('register-user');
    Route::get('/login','login')->middleware('alreadyLoggedIn');
    Route::post('/login-user','loginUser')->name('login-user');
    Route::get('/logout','logout');
});


Route::controller(BlogController::class)->group(function () {
    Route::get('/blogs', 'index')->middleware('isLoggedIn')->name('blogs.index');
    Route::get('/blogs/create', 'create')->middleware('isLoggedIn')->name('blogs.create');
    Route::post('/blogs', 'store')->name('blogs.store');
    Route::get('/blogs/{blog}', 'show')->name('blogs.show');
    Route::get('/blogs/{blog}/edit', 'edit')->name('blogs.edit');
    Route::put('/blogs/{blog}','update')->name('blogs.update');
    Route::delete('/blogs/{blog}','destroy')->name('blogs.destroy');
});
