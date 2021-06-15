<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

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
