<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaidUserController;
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
    Route::prefix('user')->middleware(['auth','isUser'])->group(function(){
        Route::get('/mypage', [UserController::class, 'UserMypage'])
        ->name('user-mypage');
        //有料会員プラン変更メッセージ
        Route::get('/mypage/premium-plan', [UserController::class, 'PremiumPlanMessage'])
        ->name('premium-plan-message');
        //有料プランに変更処理
        Route::post('/mypage/premium-register', [UserController::class, 'PremiumPlanRegister'])
        ->name('premium-plan-register');
        //不正解の単語一覧
        Route::get('/mypage/incorrect-answer', [UserController::class, 'incorrectAnswer'])
        ->name('incorrect-answer');
        //不正解の単語一覧　削除処理
        Route::post('/mypage/incorrect-answer/delete/{id}', [UserController::class, 'incorrectAnswerDelete'])
        ->name('incorrect-answer-delete');
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
       //正誤一覧画面
       Route::get('/mypage/quiz/result-list/{category_id}/{title_id}/{quiz_id}', [UserController::class, 'UserResultList'])->name('quiz.resultList'); 
        
    });

    // 有料ユーザー画面
    Route::prefix('paid-user')->middleware(['auth','isPaidUser'])->group(function(){
        Route::get('/mypage', [PaidUserController::class, 'PaidUserMypage'])
        ->name('paid-user-mypage');
        //不正解の単語一覧
        Route::get('/mypage/incorrect-answer', [PaidUserController::class, 'incorrectAnswer'])
        ->name('paid-incorrect-answer');
        //不正解の単語一覧　削除処理
        Route::post('/mypage/incorrect-answer/delete/{id}', [PaidUserController::class, 'incorrectAnswerDelete'])
        ->name('paid-incorrect-answer-delete');
        //メニュー画面
        Route::get('/mypage/menu/{category_id}/{title_id}', [PaidUserController::class, 'UserMenu'])
        ->name('paid-user-menu');
        //ユーザーマイページでviewを押した後の画面遷移 一覧表示
        Route::get('/mypage/list/{category_id}/{title_id}', [PaidUserController::class, 'UserList']) 
        ->name('paid-user-list');

        /*
        *クイズ表示、回答、次の問題
        */
        //クイズ一問目表示
        Route::get('/mypage/quiz/{category_id}/{title_id}', [PaidUserController::class, 'showQuiz'])->name('quiz.show');
        //クイズの回答をanswer_historiesに登録
        Route::post('/mypage/quiz/', [PaidUserController::class, 'submitAnswer'])->name('quiz.submit');
        Route::get('/mypage/quiz/{category_id}/{title_id}/{quiz_id}', [PaidUserController::class, 'nextQuiz'])->name('quiz.next');
        //結果画面
        Route::get('/mypage/quiz/result/{category_id}/{title_id}/{quiz_id}', [PaidUserController::class, 'finalResult'])->name('quiz.finalResult');
        //正誤一覧画面
        Route::get('/mypage/quiz/result-list/{category_id}/{title_id}/{quiz_id}', [PaidUserController::class, 'UserResultList'])->name('quiz.resultList'); 
        //お気に入り登録処理
        Route::post('/mypage/quiz/fav/{id}', [PaidUserController::class, 'favoriteWords'])->name('favorite-words');
        //お気に入り画面
        Route::get('/mypage/quiz/fav-list', [PaidUserController::class, 'favoriteWordsList'])->name('favorite-words-list');
        //お気に入りの単語一覧　削除処理
        Route::post('/mypage/fav-list/delete/{id}', [PaidUserController::class, 'favoriteWordsDelete'])
        ->name('favorite-words-delete');
        //お気に入り登録完了画面
        Route::get('/mypage/quiz/fav-registered', [PaidUserController::class, 'favoriteWordsRegistered'])->name('favorite-words-registered');
    });





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');