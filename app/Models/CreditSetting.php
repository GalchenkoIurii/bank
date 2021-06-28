<?php

namespace App\Models;

use App\Models\Traits\LocalizationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditSetting extends Model
{
    use HasFactory, LocalizationTrait;

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }
}
