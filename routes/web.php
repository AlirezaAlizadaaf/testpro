<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\register;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Models\comment;

Route::view('/','Home' );

Route::get('posts', [postsController::class, 'index']);
Route::get('posts/{post}/edit', [postsController::class, 'edit'])->middleware('auth')->can('edit', 'post');;
Route::get('posts/create' , [postsController::class, 'create'])->middleware('auth');
Route::get( 'posts/{post}' , [postsController::class, 'show']);
Route::post('posts' , [postsController::class, 'store']);
Route::delete('posts/{post}' , [postsController::class, 'destroy'])->middleware('auth')->can('edit', 'post');
Route::patch('posts/{post}' , [postsController::class, 'update']);


// CRUD Comment------------------------------------------------------------------
route::controller(commentController::class)->group(function(){
    Route::post('/comments/{post}/store' , 'store');
    Route::delete('/comments/{comment}/destroy' , 'destroy');
});
// Login controller
Route::controller(App\Http\Controllers\login::class)->group(function(){
   Route::get('/login','create')->name('login');
   Route::post('/login','store');
   route::post('/logout','destroy');
});
// register controller
Route::controller(register::class)->group(function(){
    Route::get('register','create');
    Route::post('register','store');
});

