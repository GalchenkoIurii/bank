<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, LocalizationTrait;

    protected $fillable = [
        'slug',
        'title_lt',
        'title_en',
        'title_ru',
        'value_lt',
        'value_en',
        'value_ru',
    ];
}
