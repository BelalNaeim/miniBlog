<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;



Route::group([
    'middleware'=> 'api',
],function(){
	Route::post('register', [AuthController::class, 'register']);
	Route::patch('logout', [AuthController::class, 'logout']);
	Route::get('resend-code', [AuthController::class, 'resendCode']);
	Route::post('login', [AuthController::class, 'login']);

    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts', [PostController::class, 'store']);
    Route::get('posts/{post}', [PostController::class, 'show']);

    Route::get('comments', [CommentController::class, 'index']);
    Route::post('comments', [CommentController::class, 'store']);
    Route::get('comments/{comment}', [CommentController::class, 'show']);
});

