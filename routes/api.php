<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GradebookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);

Route::get('/gradebooks', [GradebookController::class, 'index']);
Route::get('/gradebooks/{id}', [GradebookController::class, 'show']);
Route::post('/gradebooks', [GradebookController::class, 'store']);
Route::delete('/gradebooks/{id}', [GradebookController::class, 'destroy']);
Route::put('/gradebooks/{id}', [GradebookController::class, 'update']);

Route::get('/comments', [CommentController::class, 'index']);
Route::get('/comments/{id}', [CommentController::class, 'show']);
Route::post('/comments', [CommentController::class, 'store']);
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);
Route::put('/comments/{id}', [CommentController::class, 'update']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
Route::put('/students/{id}', [StudentController::class, 'update']);
