<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer_history extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_id', 'user_id', 'user_answer', 'correct_answer'];
    public function quiz()
{
    return $this->belongsTo(Quiz::class);
}
}
