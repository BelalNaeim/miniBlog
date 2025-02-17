<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;




	Route::post('register', [AuthController::class, 'register']);
	Route::post('logout', [AuthController::class, 'logout']);
	Route::post('login', [AuthController::class, 'login']);

