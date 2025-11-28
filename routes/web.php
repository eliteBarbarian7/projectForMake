<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//api маршруты
Route::get('/users', [UserController::class, 'index']); //список всех пользователей
Route::get('/posts', [PostController::class, 'index']); //список постов по страницам по 15 штук на каждой старнице
Route::get('/posts/{id}', [PostController::class, 'show']); //опрделённый пост по его id
Route::post('/posts', [PostController::class, 'store']); //содание нового поста
