<?php

namespace App\Http\Controllers;
use App\Models\Title;
use App\Models\Quiz;

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
    public function AdminListElem($id)
    {
        $titles1 = Title::where('id', $id)->get();
        // dd($titles1);
        $quizzes = Quiz::all();
        
        return view('admin.admin-list-elem',compact('titles1','quizzes'));
    }

    public function AdminListInt()
    { 
        $titles2 = Title::where('category_id', 2)->get();
        return view('admin.admin-list-int',compact('titles2'));
    }

    public function AdminListAdv()
    {
        $titles3 = Title::where('category_id', 3)->get();
        return view('admin.admin-list-adv',compact('titles3'));
    }


}