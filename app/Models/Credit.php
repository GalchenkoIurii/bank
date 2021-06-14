<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'credit_setting_id',
        'credit_sum',
        'credit_term',
        'percent',
        'monthly_payment',
        'user_id',
        'full_name',
        'phone',
        'email'
    ];
}
