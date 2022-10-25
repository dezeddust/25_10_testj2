<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('news')->name('news.')->group(function(){
    Route::get('/home', [NewsController::class, 'index'])->name('index');
    Route::post('/post-news',[NewsController::class, 'post_news'])->name('post_news');
    Route::get('/edit/{news}', [NewsController::class, 'edit'])->name('edit');
    Route::put('/edit/{news}', [NewsController::class, 'update'])->name('update');
});

