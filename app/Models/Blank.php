<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blank extends Model
{
    use HasFactory, LocalizationTrait;

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
