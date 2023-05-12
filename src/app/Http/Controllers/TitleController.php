<?php

namespace App\Http\Controllers;
use App\Models\Title;

use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function AdminMypageTitles()
    {
    //// カテゴリーごとのタイトルを表示
    $titles1 = Title::where('category_id', 1)->pluck('title');
    $titles2 = Title::where('category_id', 2)->pluck('title');
    $titles3 = Title::where('category_id', 3)->pluck('title');
    
    return view('admin.admin-mypage',compact('titles1','titles2','titles3'));
    }
    public function AdminListElem()
    {
        return view('admin.admin-list-elem');
    }

    public function AdminListInt()
    {
        return view('admin.admin-list-int');
    }

    public function AdminListAdv()
    {
        return view('admin.admin-list-adv');
    }
    
}