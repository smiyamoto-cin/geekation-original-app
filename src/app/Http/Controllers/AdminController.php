<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //   管理者マイページ
    public function AdminMypage()
    {
        return view('admin.admin-mypage');
    }

     //   タイトルごとの問題一覧ページ
     public function AdminListElem1()
     {
         return view('admin.admin-list-elem1');
     }
     public function AdminListElem2()
     {
         return view('admin.admin-list-elem2');
     }
     public function AdminListElem3()
     {
         return view('admin.admin-list-elem3');
     }
     public function AdminListInt1()
     {
         return view('admin.admin-list-int1');
     }
     public function AdminListInt2()
     {
         return view('admin.admin-list-int2');
     }
     public function AdminListInt3()
     {
         return view('admin.admin-list-int3');
     }
     public function AdminListAdv1()
     {
         return view('admin.admin-list-adv1');
     }
     public function AdminListAdv2()
     {
         return view('admin.admin-list-adv2');
     }
     public function AdminListAdv3()
     {
         return view('admin.admin-list-adv3');
     }


     //問題追加ページ
     public function AdminAdd()
     {
         return view('admin.admin-add');
     }
     
    }
