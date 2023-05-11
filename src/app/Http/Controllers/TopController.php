<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Summary of TopController
 */
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

   
    //   管理者マイページ
    public function AdminMypage()
    {
        return view('admin.admin-mypage');
    }
    //  一般マイページ
    public function UserMypage()
    {
        return view('user.user-mypage');
    }
    //一般トップ画面
    //roleごとにtopページへ
    public function userTop()
    {
        if (Auth::user()->role == '2'){
            return view('user.user-top');
        }else{
            view('home');
        }
    }
    
    

    //   有料マイページ
    
    public function PaidUserMypage()
    {
        return view('paid-user.paid-user-mypage');
    }
}
