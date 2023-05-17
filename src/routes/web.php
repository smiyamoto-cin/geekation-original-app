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
        //タイトルごとの問題一覧画面
        // Route::get('/mypage/list-elem1', [AdminController::class, 'AdminListElem1']) 
        // ->name('admin-list-elem1');
        // Route::get('/mypage/list-elem2', [AdminController::class, 'AdminListElem2']) 
        // ->name('admin-list-elem2');
        // Route::get('/mypage/list-elem3', [AdminController::class, 'AdminListElem3']) 
        // ->name('admin-list-elem3');
        // Route::get('/mypage/list-int1', [AdminController::class, 'AdminListInt1']) 
        // ->name('admin-list-int1');
        // Route::get('/mypage/list-int2', [AdminController::class, 'AdminListInt2']) 
        // ->name('admin-list-int2');
        // Route::get('/mypage/list-int3', [AdminController::class, 'AdminListInt3']) 
        // ->name('admin-list-int3');
        // Route::get('/mypage/list-adv1', [AdminController::class, 'AdminListAdv1']) 
        // ->name('admin-list-adv1');
        // Route::get('/mypage/list-adv2', [AdminController::class, 'AdminListAdv2']) 
        // ->name('admin-list-adv2');
        // Route::get('/mypage/list-adv3', [AdminController::class, 'AdminListAdv3']) 
        // ->name('admin-list-adv3');
        // Route::get('/mypage/list/add', [AdminController::class, 'AdminAdd']) 
        // ->name('admin-add');

            
            

        //管理者マイページにカテゴリーごとのタイトル名を表示
        Route::get('/mypage', [TitleController::class, 'AdminMypageTitles']) 
        ->name('admin-mypage-titles');

        //管理者マイページでviewを押した後の画面遷移 一覧表示
        Route::get('/mypage/list/{category_id}/{title_id}', [TitleController::class, 'AdminList']) 
        ->name('admin-list');

        //管理者マイページ 問題追加画面
        Route::get('/mypage/list/add/{category_id}/{title_id}', [TitleController::class, 'AdminListAdd']) 
        ->name('admin-list-add');
        //管理者マイページ 　問題追加処理
        Route::post('/mypage/list/add/create', [TitleController::class, 'AdminListCreate'])
        ->name('admin-list-create');
        //管理者マイページ 問題編集画面
        Route::get('/mypage/list/edit/{category_id}/{title_id}/{quiz_id}', [TitleController::class, 'AdminListEdit']) 
        ->name('admin-list-edit');
        //管理者マイページ 　問題編集処理
        Route::post('/mypage/list/edit/update', [TitleController::class, 'AdminListUpdate'])
        ->name('admin-list-update');
        


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