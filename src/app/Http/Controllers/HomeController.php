<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //ログインしたらyou are logged inの画面
    // public function index()
    // {
    //     return view('home');
    // }

    //roleごとにマイページへ
    public function index()
{
    if (Auth::user()->role == '1') {
        return view('admin.admin-mypage');
    } elseif (Auth::user()->role == '2') {
        return view('user.user-mypage');
    } elseif (Auth::user()->role == '3') {
        return view('paid-user.paid-user-mypage');
    } else {
        return view('home');
    }
}

}
