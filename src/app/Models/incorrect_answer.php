<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incorrect_answer extends Model
{
    use HasFactory;
    protected $table = 'incorrect_answers';
    protected $fillable = ['user_id', 'quiz_id', 'correct_answer'];
}
