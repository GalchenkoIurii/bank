<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blank extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_lt',
        'title_en',
        'title_ru',
        'text_lt',
        'text_en',
        'text_ru',
        'slug',
    ];
}
