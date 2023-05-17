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


    //問題追加画面
    // public function AdminListAdd($id)
    // {
    //     $categories = Category::all();
    //     $titles = Title::where('id', $id)->get();
        
    //     return view('admin.admin-add',compact('titles','categories'));
    // }
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
        // dd($request);
        $categoryData =$request->all();
        $titleData =$request->only('id');
        $quizData = $request->only('question'); // クイズのデータを取得
        $choicesData = $request->input('choice'); // 選択肢のデータを取得


        //カテゴリー
        $category = Category::create($categoryData);
        $categoryID =$category->id;
        
        $title = Title::create([
            'category_id' => $categoryID,
            'id' => $titleData
        ]);

        $titleId = $title->id;

        // クイズを作成し、タイトルのIDを取得
        $quiz = Quiz::create([
            'title_id' => $titleId,
            'question' => $quizData
        ]);
        
        $quizId = $quiz->id;

        // 選択肢を作成し、クイズと関連付ける
        foreach ($choicesData as $choice) {
        Choice::create([
            'quiz_id' => $quizId,
            'choice' => $choice
        ]);

        // $inputs =$request->all();
        // // dd($inputs);
        //     Quiz::create($inputs);
        //     Choice::create($inputs);
        return redirect()->route('admin-mypage-titles');
    }

}
}