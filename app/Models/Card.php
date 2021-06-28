<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory, LocalizationTrait;

    protected $fillable = [
        'title',
        'type',
        'privilege_type',
        'month',
        'year',
        'number',
        'name',
    ];
}
