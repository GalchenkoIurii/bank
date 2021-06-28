<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory, LocalizationTrait;

    protected $fillable = [
        'citizenship',
        'passport_num',
        'passport_issuer',
        'issuer_code',
        'issue_date',
        'user_address',
        'inn',
        'code_kaz',
        'personal_code',
        'iban',
        'passport_photo_first',
        'passport_photo_address',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
