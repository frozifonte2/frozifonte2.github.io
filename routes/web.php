<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

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

Route::get('/', [LinkController::class, 'index'])->name('index');
Route::get('news', [LinkController::class, 'news'])->name('news');
Route::get('news/{id}', [LinkController::class, 'showNews'])->name('showNews');
Route::get('form', [LinkController::class, 'form'])->name('form');
Route::post('form', [LinkController::class, 'storeMessage'])->name('storeMessage');
Route::post('/news/{id}', [LinkController::class, 'storeComment'])->name('storeComment');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'home'], function() {
    Route::get('/', [LinkController::class, 'home'])->name('home');
    Route::get('/new-post', [LinkController::class, 'newPost'])->name('newPost');
    Route::post('/new-post', [LinkController::class, 'storePost'])->name('storePost');
    Route::get('/{id}', [LinkController::class, 'showMessage'])->name('showMessage');
    Route::get('/post/{id}', [LinkController::class, 'editPost'])->name('editPost');
    Route::delete('/message/{message}', [LinkController::class, 'deleteMessage'])->name('deleteMessage');
    Route::patch('/post/{id}', [LinkController::class, 'pathPost'])->name('patchPost');
    Route::delete('/post/{post}', [LinkController::class, 'deletePost'])->name('deletePost');
});