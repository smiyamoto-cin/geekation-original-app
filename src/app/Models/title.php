<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class title extends Model
{
    use HasFactory;

    /**
     * Categoryリレーション
     */    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Quizzesリレーション
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'id', 'title_id');
    }
}
