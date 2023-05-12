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

   
    
    //  一般マイページ
    public function UserMypage()
    {
        return view('user.user-mypage');
    }
   
    
    

    //   有料マイページ
    
    public function PaidUserMypage()
    {
        return view('paid-user.paid-user-mypage');
    }
}
