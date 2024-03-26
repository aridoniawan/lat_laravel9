<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Hellocontroller;
use App\Http\Controllers\Postcontroller;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('views/posts');
// });

Route::get('/', [Postcontroller::class, 'index']);

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);



Route::get('posts', [Postcontroller::class, 'index']);
Route::get('posts/create', [Postcontroller::class, 'create']);
Route::post('posts', [Postcontroller::class, 'store']);
Route::get('posts/{id}/edit', [Postcontroller::class, 'edit']);
Route::get('posts/{id}', [Postcontroller::class, 'show']);
Route::patch('posts/{id}', [Postcontroller::class, 'update']);
Route::delete('posts/{id}', [Postcontroller::class, 'destroy']);


