<?php

namespace App\Models;
use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

     // モデルに関連づけるテーブル
   protected $table = 'categories';

    // テーブルに関連づける主キー
   protected $primaryKey = 'id';

   // 登録・編集ができるカラム
   protected $fillable = [

    'id',
    'name',
];

    /**
     * Titlesリレーション
     */
    public function titles()
    {
        return $this->hasMany(Title::class, 'id', 'category_id');
    }
}
