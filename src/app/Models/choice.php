<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class choice extends Model
{
    use HasFactory;

    // モデルに関連づけるテーブル
    protected $table = 'choices';

    // テーブルに関連づける主キー
    protected $primaryKey = 'id';

    // 登録・編集ができるカラム
    protected $fillable = [
        'id',
        'quiz_id',
        'choice',
        'is_answer',
        'created_at',
        'updated_at',
    ];
    /**
     * Quizテーブルとリレーション
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
    /**
     * choicesテーブルのレコードを全件取得
     * 
     * 
     * @return Choice choicesテーブル
     */
    public function allChoicesData()
    {
        return $this->get();
    }

}
