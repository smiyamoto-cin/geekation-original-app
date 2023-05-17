<?php

namespace App\Http\Controllers;

use App\Models\title;
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
    $titles1 = Title::where('category_id', 1)->get();
    $titles2 = Title::where('category_id', 2)->get();
    $titles3 = Title::where('category_id', 3)->get();
    
    if (Auth::user()->role == '1') {
        return view('admin.admin-mypage',compact('titles1','titles2','titles3'));
    } elseif (Auth::user()->role == '2') {
        return view('user.user-mypage',compact('titles1','titles2','titles3'));
    } elseif (Auth::user()->role == '3') {
        return view('paid-user.paid-user-mypage',compact('titles1','titles2','titles3'));
    } else {
        return view('home');
    }
}

    }
    
