<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

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

// 入力ページ
Route::get('/', [ContactController::class, 'index']);           // お問い合わせページ表示
Route::post('/confirm', [ContactController::class, 'confirm']); // 確認ページに遷移
Route::post('/', [ContactController::class, 'store']);          // データベースに値を保存

// 確認ページ
Route::get('/confirm', [ConfirmController::class, 'index']);    // 確認ページの表示
Route::post('/', [ConfirmController::class, 'retouch']);        // 修正する為にお問い合わせページに遷移

// サンクスページ
Route::get('/thanks', [ThanksController::class, 'index']);      // サンクスページの表示

// ログインしてたら管理画面に遷移
Route::middleware('auth')->group(function(){
    Route::get('/admin', [AuthController::class, 'index']);
});

// 管理画面
Route::get('/admin', [AdminController::class, 'search']);       // サーチ機能
Route::delete('/admin', [AdminController::class, 'destroy']);   // 削除機能
