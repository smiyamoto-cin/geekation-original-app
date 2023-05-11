<?php

use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// トップ画面

Route::get('/', [TopController::class, 'Top'])
    ->name('top');


// 管理者画面
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/mypage', [TopController::class, 'AdminMypage']) //  /admin/いらん
    ->name('admin-mypage');
});


// 一般画面
Route::prefix('user')->group(function(){
    Route::get('/mypage', [TopController::class, 'UserMypage'])
    ->name('user-mypage');
    Route::get('/mypage/top', [TopController::class, 'userTop'])
        ->name('user-top');
});

// 有料画面
Route::get('/paid-user/mypage', [TopController::class, 'PaidUserMypage'])
->name('paid-user-mypage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
