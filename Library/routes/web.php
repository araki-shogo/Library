<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;

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

// authのmiddlewareで囲んでおけばログイン必須の画面になる
Route::group(['middleware' => ['auth']], function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/add', [BookController::class, 'add']);
    Route::post('/books/add', [BookController::class, 'create']);
    Route::get('/books/edit/{id}', [BookController::class, 'edit']);
    Route::post('/books/edit/{id}', [BookController::class, 'update']);
    Route::delete('/books/edit/{id}', [BookController::class, 'delete']);

    Route::get('/lendings', [LendingController::class, 'index_all']);
    Route::post('/lendings/lent', [LendingController::class, 'lent']);
    Route::post('/lendings/return', [LendingController::class, 'return']);
});