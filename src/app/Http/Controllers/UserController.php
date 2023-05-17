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
        $categories = Category::where('id', $category_id)->get();
        $titles = Title::where('id', $title_id)->get();
        return view('user.user-menu',compact('categories','titles'));
    }

    //問題一覧を表示
    public function UserList($category_id,$title_id)
    {
        $categories = Category::where('id', $category_id)->get();
        $titles  = Title::where('id', $title_id)->get();
        $quizzes = Quiz::where('title_id', $title_id)->get();
        $choices = Choice::all();

        // セッションに値を保存
        session(['category_id' => $category_id, 'title_id' => $title_id]);
        
        return view('user.user-list',compact('categories','titles','choices','quizzes'));
    }

}


