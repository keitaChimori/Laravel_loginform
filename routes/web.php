<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginformController;


// ログインフォーム表示
Route::get('/',[LoginformController::class,'showLogin'])->name('showLogin');

// ログイン処理
Route::post('/login',[LoginformController::class,'login'])->name('login');

// 新規登録
Route::get('/register',[LoginformController::class,'showRegister'])->name('showRegister');

// 新規登録確認画面
Route::post('/registerConfirm',[LoginformController::class,'registerConfirm'])->name('registerConfirm');

// 新規登録実行
Route::post('/registerDone',[LoginformController::class,'registerDone'])->name('registerDone');