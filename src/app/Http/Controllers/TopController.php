<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    //
     /**
     * トップ画面
     */
    public function Top()
    {
        return view('top');
    }
    //   管理者画面
    public function AdminMypage()
    {
        return view('admin.admin-mypage');
    }
    //  一般画面
    public function UserMypage()
    {
        return view('user.user-mypage');
    }
    //   有料画面
    
    public function PaidUserMypage()
    {
        return view('paid-user.paid-user-mypage');
    }
}
