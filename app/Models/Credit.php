<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory, LocalizationTrait;

    protected $fillable = [
        'credit_setting_id',
        'credit_sum',
        'credit_term',
        'percent',
        'monthly_payment',
        'user_id',
        'full_name',
        'phone',
        'email',
        'reviewing',
        'result',
        'credit_agreement',
        'payments_table',
    ];

    public function creditSetting()
    {
        return $this->belongsTo(CreditSetting::class);
    }
}
