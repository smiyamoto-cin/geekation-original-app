<?php

namespace App\Models;
use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    /**
     * Titlesリレーション
     */
    public function titles()
    {
        return $this->hasMany(Title::class, 'id', 'category_id');
    }
}
