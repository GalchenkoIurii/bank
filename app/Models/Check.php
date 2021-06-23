<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_lt',
        'title_en',
        'title_ru',
        'sum',
        'operation_id',
    ];

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
