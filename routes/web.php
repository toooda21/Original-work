<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);

    //商品編集画面を表示
    Route::get('/edit/{id}',[App\Http\Controllers\ItemController::class, 'edit']);
    //商品編集を実行
    Route::post('/edit',[App\Http\Controllers\ItemController::class, 'itemEdit']);
    //商品の削除を実行
    Route::post('/delete/{id}',[App\Http\Controllers\ItemController::class, 'itemDelete']);
    

});
