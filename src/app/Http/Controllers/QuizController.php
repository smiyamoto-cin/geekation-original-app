<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function AdminQuizElem()
    {
        // Eloquentでeventsテーブルにあるデータを全て取得
        $quizzes = Quiz::all();
        // dd($quizzes);
        return view('admin.admin-list-elem', compact('quizzes'));
    }
}
