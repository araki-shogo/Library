<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [LendingController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'search']);
Route::get('/lendings', [LendingController::class, 'index_all']);
Route::post('/lendings', [LendingController::class, 'search']);

// authのmiddlewareで囲んでおけばログイン必須の画面になる
Route::group(['middleware' => ['auth']], function () {
    Route::get('/books/add', [BookController::class, 'add']);
    Route::post('/books/add', [BookController::class, 'create']);
    Route::post('/books/edit/{id}', [BookController::class, 'update']);
    Route::get('/books/edit/{id}', [BookController::class, 'edit']);

    Route::get('/lendings/{id}', [LendingController::class, 'history']);
    Route::post('/lendings/lent', [LendingController::class, 'lent']);
    Route::post('/lendings/return', [LendingController::class, 'return']);

    // 管理者用
    Route::group(['middleware' => ['auth', 'can:master']], function () {
        Route::delete('/books/edit/{id}', [BookController::class, 'delete']);
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'edit']);
        Route::post('/users/{id}', [UserController::class, 'delete']);
    });
});
