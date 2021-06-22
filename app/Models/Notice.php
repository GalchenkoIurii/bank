<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_lt',
        'title_en',
        'title_ru',
        'text_lt',
        'text_en',
        'text_ru',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
