<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TitleController;
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
        Route::get('/mypage', [AdminController::class, 'AdminMypage']) //  /admin/いらん
        ->name('admin-mypage');
 
        //管理者マイページにカテゴリーごとのタイトル名を表示
        Route::get('/mypage', [TitleController::class, 'AdminMypageTitles']) 
        ->name('admin-mypage-titles');

        //管理者マイページでviewを押した後の画面遷移 一覧表示
        Route::get('/mypage/list/{category_id}/{title_id}', [TitleController::class, 'AdminList']) 
        ->name('admin-list');

        //管理者マイページ 追加画面
        Route::get('/mypage/list/add/{category_id}/{title_id}', [TitleController::class, 'AdminListAdd']) 
        ->name('admin-list-add');
        //管理者マイページ 　追加処理
        Route::post('/mypage/list/add/create', [TitleController::class, 'AdminListCreate'])
        ->name('admin-list-create');
        //管理者マイページ 編集画面
        Route::get('/mypage/list/edit/{category_id}/{title_id}/{quiz_id}', [TitleController::class, 'AdminListEdit']) 
        ->name('admin-list-edit');
        //管理者マイページ 　編集処理
        Route::post('/mypage/list/edit/update', [TitleController::class, 'AdminListUpdate'])
        ->name('admin-list-update');
        //管理者マイページ 　削除処理
        Route::post('/mypage/list/delete/{id}', [TitleController::class, 'AdminListDelete'])
        ->name('admin-list-delete');
        


});



// 一般画面
Route::prefix('user')->group(function(){
    Route::get('/mypage', [TopController::class, 'UserMypage'])
    ->name('user-mypage');
});

// 有料画面
Route::get('/paid-user/mypage', [TopController::class, 'PaidUserMypage'])
->name('paid-user-mypage');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');