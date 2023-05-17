<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaidUserController extends Controller
{
    //  

    //   有料マイページ
    
    public function PaidUserMypage()
    {
        return view('paid-user.paid-user-mypage');
    }
}
