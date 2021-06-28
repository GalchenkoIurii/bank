<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory, LocalizationTrait;

    protected $fillable = [
        'user_id',
        'control_sum_lt',
        'control_sum_en',
        'control_sum_ru',
        'balance_rur',
        'balance_usd',
        'balance_eur',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
