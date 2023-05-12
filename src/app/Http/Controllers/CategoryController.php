<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //カテゴリー一覧画面
    public function AdminCategoryElem1()
    {
        // Eloquentでcategoriesテーブルにあるデータを全て取得
        $categories = Category::where('id', 1)->pluck('title');
        
        return view('admin.admin-list-elem1',compact('categories'));
    }
}
