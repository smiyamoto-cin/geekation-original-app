<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\choice;
use App\Models\quiz;
use App\Models\title;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    //
     /**
     * トップ画面
     */
    public function Top()
    {
        return view('top');
    }

   
    
    //  一般マイページ
    public function UserMypage()
    {
        $titles1 = Title::where('category_id', 1)->get();
        $titles2 = Title::where('category_id', 2)->get();
        $titles3 = Title::where('category_id', 3)->get();
        return view('user.user-mypage',compact('titles1','titles2','titles3'));
    }

    //メニューを表示
    public function UserMenu($category_id,$title_id)
    { 
        // セッションに値を保存
        session(['category_id' => $category_id, 'title_id' => $title_id]);
        $categories = Category::where('id', $category_id)->get();
        $titles = Title::where('id', $title_id)->get();
        return view('user.user-menu',compact('categories','titles'));
    }

    //問題一覧を表示
    public function UserList($category_id,$title_id)
    {
        // dd($category_id);
        // カテゴリーのデータを取得
        $category_id = session('category_id');
        $categories = Category::where('id', $category_id)->get();
    
        // タイトルのデータを取得
        $title_id = session('title_id');
        $titles = Title::where('id', $title_id)->get();

        $quizzes = Quiz::where('title_id', $title_id)->get();
        $choices = Choice::all();
        
        return view('user.user-list',compact('categories','titles','choices','quizzes'));
    }

    //クイズ画面
    public function UserQuiz($category_id,$title_id,$quiz_id)
    {
         
        
        return view('user.user-quiz');
    }

    public function UserAnswerUpdate(Request $request)
    {
        // 回答の保存処理などを行う

        // 次の問題へのリダイレクト
        return redirect()->route('admin-list', [
            // 'category_id' => $category_id,
            // 'title_id' => $title_id,
            // 'quiz_id' => $next_quiz_id,
        ]);
    }

}


