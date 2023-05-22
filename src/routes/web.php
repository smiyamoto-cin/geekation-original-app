<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'Top'])
    ->name('top');


// 管理者画面
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
        Route::get('/mypage', [AdminController::class, 'AdminMypage']) //  /admin/いらん
        ->name('admin-mypage');
 
        //管理者マイページにカテゴリーごとのタイトル名を表示
        Route::get('/mypage', [AdminController::class, 'AdminMypageTitles']) 
        ->name('admin-mypage-titles');

        //管理者マイページでviewを押した後の画面遷移 一覧表示
        Route::get('/mypage/list/{category_id}/{title_id}', [AdminController::class, 'AdminList']) 
        ->name('admin-list');

        //管理者マイページ 追加画面
        Route::get('/mypage/list/add/{category_id}/{title_id}', [AdminController::class, 'AdminListAdd']) 
        ->name('admin-list-add');
        //管理者マイページ 　追加処理
        Route::post('/mypage/list/add/create', [AdminController::class, 'AdminListCreate'])
        ->name('admin-list-create');
        //管理者マイページ 編集画面
        Route::get('/mypage/list/edit/{category_id}/{title_id}/{quiz_id}', [AdminController::class, 'AdminListEdit']) 
        ->name('admin-list-edit');
        //管理者マイページ 　編集処理
        Route::post('/mypage/list/edit/update', [AdminController::class, 'AdminListUpdate'])
        ->name('admin-list-update');
        //管理者マイページ 　削除処理
        Route::post('/mypage/list/delete/{id}', [AdminController::class, 'AdminListDelete'])
        ->name('admin-list-delete');
        


});



    // 一般ユーザー画面
    Route::prefix('user')->group(function(){
        Route::get('/mypage', [UserController::class, 'UserMypage'])
        ->name('user-mypage');
        //メニュー画面
        Route::get('/mypage/menu/{category_id}/{title_id}', [UserController::class, 'UserMenu'])
        ->name('user-menu');
        //ユーザーマイページでviewを押した後の画面遷移 一覧表示
        Route::get('/mypage/list/{category_id}/{title_id}', [UserController::class, 'UserList']) 
        ->name('user-list');

        /*
        *クイズ表示、回答、次の問題
        */
        //クイズ一問目表示
        Route::get('/mypage/quiz/{category_id}/{title_id}', [UserController::class, 'showQuiz'])->name('quiz.show');
        //クイズの回答をanswer_historiesに登録
        Route::post('/mypage/quiz/', [UserController::class, 'submitAnswer'])->name('quiz.submit');
        Route::get('/mypage/quiz/{category_id}/{title_id}/{quiz_id}', [UserController::class, 'nextQuiz'])->name('quiz.next');
        //結果画面
        Route::get('/mypage/quiz/result/{category_id}/{title_id}/{quiz_id}', [UserController::class, 'finalResult'])->name('quiz.finalResult');
        
        
    });

// 有料ユーザー画面
// Route::get('/paid-user/mypage', [PaidUserController::class, 'PaidUserMypage'])
// ->name('paid-user-mypage');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');