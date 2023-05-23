<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizAnswerRequest;
use App\Models\answer_history;
use App\Models\category;
use App\Models\choice;
use App\Models\incorrect_answer;
use App\Models\Quiz;
use App\Models\title;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $titles1 = Title::where('category_id', 1)->get();
        $titles2 = Title::where('category_id', 2)->get();
        $titles3 = Title::where('category_id', 3)->get();
        return view('user.user-mypage',compact('titles1','titles2','titles3'));
    }
    //有料プランに変更のメッセージ
    public function PremiumPlanMessage()
    {
        $user = Auth::user();
        return view('user.user-premium-plan',compact('user'));
    }
//有料プラン変更処理
    public function PremiumPlanRegister(Request $request)
    {
        $user=User::find($request->user_id);
        if ($user) {
            $user->role = 3; // 有料プランのロールIDに応じて変更してください
            $user->save();
            return redirect()->route('paid-user-mypage')->with('success', '有料プランに変更されました。');
        } else {
            return redirect()->route('user-mypage')->with('error', 'ユーザーが見つかりませんでした。');
        }
    }
     //不正解の単語一覧
     public function incorrectAnswer()
     { 
        $user_id = auth()->user()->id;
        $incorrectAnswers=incorrect_answer::where('user_id', $user_id)->get();
       

         return view('user.user-incorrect-answer',compact('incorrectAnswers'));
     }
    //不正解の単語一覧　削除処理
    public function incorrectAnswerDelete($id)
    {
        // 関連する問題と選択肢の削除
        incorrect_answer::where('id', $id)->delete();
        

        return redirect()->route('incorrect-answer')->with('success', '問題の削除に成功しました。');
    
    }

    //メニューを表示
    public function UserMenu($category_id,$title_id)
    { 
        // セッションに値を保存
        session(['category_id' => $category_id, 'title_id' => $title_id]);
        $categories = Category::where('id', $category_id)->get();
        $titles = Title::where('id', $title_id)->get();
        $quizzes = Quiz::where('title_id', $title_id)->orderBy('id', 'asc')->get();

        return view('user.user-menu',compact('categories','titles','quizzes'));
    }

    //問題一覧を表示
    public function UserList($category_id,$title_id)
    {
        // dd($category_id);
        // カテゴリーのデータを取得
        $category_id = session('category_id');
       
        $categories = Category::where('id', $category_id)->get();
    
        // タイトルのデータを取得
        $title_id = session('title_id');
        $titles = Title::where('id', $title_id)->get();

        $quizzes = Quiz::where('title_id', $title_id)->get();
       
        $choices = Choice::all();
        
        return view('user.user-list',compact('categories','titles','choices','quizzes'));
    }

    public function showQuiz(Request $request,$category_id, $title_id)
    {
        $request->session()->put('correct_answers_count',[]);
        $category = Category::findOrFail($category_id);
        $title = Title::findOrFail($title_id);
        $firstQuiz = Quiz::where('title_id', $title_id)->first();
        $choices = Choice::where('quiz_id', $firstQuiz->id)->get();

        return view('user.user-show', compact('category', 'title', 'firstQuiz', 'choices'));
    }

    public function submitAnswer(QuizAnswerRequest $request)
    { 
        // 回答の保存などの処理を行う
        $category_id = $request->get('category_id');
        $category = Category::findOrFail($category_id);
        $title_id = $request->get('title_id');
        $title = Title::findOrFail($title_id);
        $quiz_id=$request->get('next_quiz_id');
        
        // ユーザーが回答した選択肢のIDを取得
        $selectedChoiceId = $request->input('user_answer');

        // 選択肢の情報を取得
        $choice = Choice::find($selectedChoiceId);
        $correctAnswer = $choice->where('is_answer', 1)->first()->id;

        // 正解かどうかを判定
        $isCorrect = ($choice->is_answer == 1);

        
        // 回答履歴の保存
        Answer_History::create([
            'quiz_id' => $choice->quiz_id,
            'user_id' => auth()->user()->id,
            'user_answer' => $selectedChoiceId,
            'correct_answer' => $isCorrect ? $selectedChoiceId : null,
            
        ]);


        $correctAnswersCount=$request->session()->get('correct_answers_count')===[]? 0:$request->session()->get('correct_answers_count');

        // 正解の場合は正解数を増やす
        if ($isCorrect) {
            $correctAnswersCount++;
        };

        // 不正解の場合の処理
    if (!$isCorrect) {
        $user_id = auth()->user()->id;
        $incorrectAnswer = new Incorrect_Answer();
        $incorrectAnswer->user_id = auth()->user()->id;
        $incorrectAnswer->quiz_id = $choice->quiz_id;
        
        // 正解の選択肢を取得
        $correctChoice = Choice::where('quiz_id', $choice->quiz_id)
            ->where('is_answer', 1)
            ->first();
        // 不正解の問題を取得
        $incorrectQuestion = Quiz::where('id', $choice->quiz_id)
        ->value('question');

        // 不正解の問題のテキストを保存
        if ($incorrectQuestion) {
            $incorrectAnswer->question = $incorrectQuestion;
        }
        // 同一ユーザーの重複をチェックする
        $existingIncorrectAnswer = Incorrect_Answer::where('user_id', $user_id)
        ->where('quiz_id', $quiz_id)
        ->where('correct_answer', $correctChoice->choice)
        ->first();
        // 正解の選択肢のテキストを保存
        if ($correctChoice) {
            $incorrectAnswer->correct_answer = $correctChoice->choice;
        }
        // 重複していない場合のみ保存する
    if (!$existingIncorrectAnswer) {
        $incorrectAnswer = new Incorrect_Answer();
        $incorrectAnswer->user_id = auth()->user()->id;
        $incorrectAnswer->quiz_id = $choice->quiz_id;
        $incorrectAnswer->correct_answer = $correctChoice->choice;
        $incorrectAnswer->question = $incorrectQuestion;
        $incorrectAnswer->save();
    }
    }

        // 正誤判定の結果と正解数をセッションに保存
        // $request->session()->flash('result', $isCorrect);
        $request->session()->put('correct_answers_count', $correctAnswersCount);

        $quiz = Quiz::findOrFail($quiz_id);

        return view('user.user-result', compact('category', 'title', 'quiz', 'isCorrect'));
    }

    public function nextQuiz($category_id, $title_id, $quiz_id)
    {
        $category = Category::findOrFail($category_id);
        $title = Title::findOrFail($title_id);
        $nextQuiz = Quiz::where('title_id', $title_id)->where('id', '>', $quiz_id)->first();
        $result = request()->query('result');

        if ($nextQuiz) {
            $choices = Choice::where('quiz_id', $nextQuiz->id)->get();
            return view('user.user-next', compact('category', 'title', 'nextQuiz', 'choices'));
        } else {
            return redirect()->route('quiz.finalResult', [
                'category_id' => $category_id,
                'title_id' => $title_id,
                'quiz_id' => $quiz_id,
            ]);
        }
    }

    public function finalResult(Request $request,$category_id,$title_id,$quiz_id)
    {
       
        $correctAnswersCount =$request->session()->get('correct_answers_count');
        $category = Category::find($category_id);
        $title = Title::find($title_id);
        $user_id = auth()->user()->id;
        $quiz=Quiz::find($quiz_id);

        
        // ユーザーの回答履歴を取得
        $answerHistory = Answer_History::where('user_id', auth()->user()->id)->get();

        // 全問題数を取得
        $totalQuestions = Quiz::where('title_id', $title_id)->count();

        

        return view('user.user-final-result',compact('category','title', 'totalQuestions','correctAnswersCount','quiz'));
    }

        //正誤一覧を表示
    public function UserResultList($category_id, $title_id, $quiz_id)
    {
        $categories = Category::where('id', $category_id)->get();
        $titles = Title::where('id', $title_id)->get();
        $category = Category::findOrFail($category_id);
        $title = Title::findOrFail($title_id);
        $quizzes = Quiz::where('title_id', $title_id)->get();
        
        
            
            
            $choices=Choice::get();
        
            $latestIds = Answer_History::selectRaw('MAX(id) as max_id')
            ->where('user_id', auth()->user()->id)
            ->groupBy('quiz_id')
            ->pluck('max_id');

            $answerHistories = Answer_History::whereIn('id', $latestIds)
            ->orderBy('id', 'desc')
            ->get();

    
        // foreach($answerHistories as $answerHistory)
        // $userChoice = Choice::find($answerHistory->user_answer);
        
        return view('user.user-result-list', compact('titles', 'quizzes','choices' ,'answerHistories','category','title'));
    }

}