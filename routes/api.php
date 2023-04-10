<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GradebookController;
use App\Http\Controllers\StudentController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/active-user', [AuthController::class, 'getActiveUser'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::get('/users/available', [UserController::class, 'getAvailable'])->middleware(('auth'));
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth');

Route::get('/gradebooks', [GradebookController::class, 'index'])->middleware('auth');
Route::get('/mygradebook', [GradebookController::class, 'myGradebook'])->middleware('auth');
Route::get('/gradebooks/{id}', [GradebookController::class, 'show'])->middleware('auth');
Route::post('/gradebooks', [GradebookController::class, 'store'])->middleware('auth');
Route::delete('/gradebooks/{id}', [GradebookController::class, 'destroy'])->middleware('auth');
Route::put('/gradebooks/{id}', [GradebookController::class, 'update'])->middleware('auth');

Route::get('/comments', [CommentController::class, 'index'])->middleware('auth');
Route::get('/comments/{id}', [CommentController::class, 'show'])->middleware('auth');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->middleware('auth');
Route::put('/comments/{id}', [CommentController::class, 'update'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/students/{id}', [StudentController::class, 'show'])->middleware('auth');
Route::post('/students', [StudentController::class, 'store'])->middleware('auth');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->middleware('auth');
Route::put('/students/{id}', [StudentController::class, 'update'])->middleware('auth');
