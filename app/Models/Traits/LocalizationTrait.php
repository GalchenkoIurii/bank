<?php

namespace App\Models\Traits;


use Illuminate\Support\Facades\App;

trait LocalizationTrait
{
    protected $defaultLocale = 'lt';

    public function getCurrentLocale()
    {
        return App::getLocale() ?? $this->defaultLocale;
    }

    public function __($field)
    {
        $field .= '_' . $this->getCurrentLocale();

        return $this->$field;
    }
}