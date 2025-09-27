<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;


// Aqui esta as rotas iniciais do projeto.
Route::get('/', function () {
    return view('login');
})->name('login.view');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register/view', function () {
    return view('register');
})->name('register.view');
Route::post('/register', [UserController::class, 'register'])
->name('register.post');
//======================================


Route::get('/home', function () {
    return view('home');
})/*->middleware('auth')*/->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login.view');
})->name('logout');

Route::get('/posts', [PostsController::class, 'getAllPosts'])->name('posts.all');
Route::get('/posts/create', function() {
    return view('createPost');
})->name('posts.create.view');
Route::post('/posts', [PostsController::class, 'createPost'])->name('posts.create');
