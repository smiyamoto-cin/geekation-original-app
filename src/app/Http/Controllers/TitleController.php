<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Title;
use App\Models\Quiz;
use App\Models\Choice;



use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function AdminMypageTitles()
    {

    //// カテゴリーごとのタイトルを表示
    $titles1 = Title::where('category_id', 1)->get();
    $titles2 = Title::where('category_id', 2)->get();
    $titles3 = Title::where('category_id', 3)->get();
    
    
    return view('admin.admin-mypage',compact('titles1','titles2','titles3'));
    }

    //クリックしたタイトルごとのタイトル名と問題と選択肢を表示
    public function AdminList($category_id,$title_id)
    {
        $categories = Category::where('id', $category_id)->get();
        $titles = Title::where('id', $title_id)->get();
        $quizzes =Quiz::where('title_id', $title_id)->get();
        $choices = Choice::all();

        // セッションに値を保存
        session(['category_id' => $category_id, 'title_id' => $title_id]);
        
        return view('admin.admin-list',compact('categories','titles','choices','quizzes'));
    }

    public function AdminListAdd()
    {
        // カテゴリーのデータを取得
        $category_id = session('category_id');
        $categories = Category::where('id', $category_id)->get();
    
        // タイトルのデータを取得
        $title_id = session('title_id');
        $titles = Title::where('id', $title_id)->get();
        
        return view('admin.admin-add', compact('titles', 'categories'));
    }
    

    //問題追加処理
    public function AdminListCreate(Request $request)
    {
        // Quizのデータを登録
        $quiz = Quiz::create($request->all());
        $quiz_id = $quiz->id; // 登録されたQuizのIDを取得
       
        // Choiceテーブルへのデータ登録
        $choices = $request->input('choices');
        $choice1 = $choices[0];
        $choice2 = $choices[1];
        $choice3 = $choices[2];
        
        // 選択肢1を作成
        $choiceInputs[] = [
            'choice' => $choice1,
            'quiz_id' => $quiz_id,
        ];

        // 選択肢2を作成
        $choiceInputs[] = [
            'choice' => $choice2,
            'quiz_id' => $quiz_id,
        ];

        // 選択肢3を作成
        $choiceInputs[] = [
            'choice' => $choice3,
            'quiz_id' => $quiz_id,
        ];

        // Choiceテーブルにデータを作成
        Choice::insert($choiceInputs);

        return redirect()->route('admin-list', ['category_id' => $request->category_id, 'title_id' => $request->title_id]);
    
    }
}