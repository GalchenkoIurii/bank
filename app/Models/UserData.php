<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizenship',
        'personal_code',
        'iban',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
