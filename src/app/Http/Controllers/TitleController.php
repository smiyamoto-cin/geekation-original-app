<?php

namespace App\Http\Controllers;
use App\Models\Title;
use App\Models\Quiz;
use App\Models\Choice;


use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function AdminMypageTitles()
    {

    //// カテゴリーごとのタイトルを表示
    $titles1 = Title::where('category_id', 1)->get();
    $titles2 = Title::where('category_id', 2)->get();
    $titles3 = Title::where('category_id', 3)->get();
    
    
    return view('admin.admin-mypage',compact('titles1','titles2','titles3'));
    }

    //クリックしたタイトルごとのタイトル名と問題と選択肢を表示
    public function AdminList($id)
    {
        $titles = Title::where('id', $id)->get();
        $quizzes =Quiz::where('title_id', $id)->get();
        $choices = Choice::all();
        
        return view('admin.admin-list',compact('titles','choices','quizzes'));
    }

    // public function AdminListInt()
    // { 
    //     $titles2 = Title::where('category_id', 2)->get();
    //     return view('admin.admin-list-int',compact('titles2'));
    // }

    // public function AdminListAdv()
    // {
    //     $titles3 = Title::where('category_id', 3)->get();
    //     return view('admin.admin-list-adv',compact('titles3'));
    // }

    //追加画面
    public function AdminListAdd($id){
        $titles = Title::where('id', $id)->get();
        return view('admin.admin-add',compact('titles'));
    }

}