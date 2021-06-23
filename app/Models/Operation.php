<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_lt',
        'description_lt',
        'type',
        'sum',
        'currency',
        'phone',
        'number',
        'bik',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function check()
    {
        return $this->hasOne(Check::class);
    }
}
