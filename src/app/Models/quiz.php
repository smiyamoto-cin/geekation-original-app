<?php

namespace App\Models;
use App\Models\Choice;
use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;
   // モデルに関連づけるテーブル
   protected $table = 'quizzes';

   // テーブルに関連づける主キー
   protected $primaryKey = 'id';
  
   // 登録・編集ができるカラム
    protected $fillable = [
        'id',
        'title_id',
        'question',
        'created_at',
        'updated_at',
    ];


    /**
     * Titlesリレーション
     */
    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id', 'id');
    }
    /**
     * Choicesリレーション
     */
    public function choices()
    {
        return $this->hasMany(choice::class, 'id', 'quiz_id');
    }
    /**
     * quizzesテーブルのレコードを全件取得
     * 
     * 
     * @return Quiz quizzesテーブル
     */
    public function allQuizzesData()
    {
        return $this->get();
    }
    /**
     * 登録処理 quizzesテーブルにデータをinsert
     * 
     */
    // public function insertQuizData($request)
    // {
    //     return $this->create([
    //         'title_id' => $request->title_id,
    //         'question'       => $request->question,
    //     ]);
    // }
}