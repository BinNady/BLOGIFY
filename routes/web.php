<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return redirect()->route('posts.index');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/login-warning', function () {
    return view('auth.login-warning');
})->name('login-warning');



Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');



Route::middleware(['auth'])->group(function () {

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

   
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.show');

    
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});



Route::resource('posts', PostController::class)->only(['show']);
