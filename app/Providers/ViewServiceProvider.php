<?php

namespace App\Providers;

use App\Http\View\Composers\SettingsComposer;
use App\Http\View\Composers\SideSettingsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'layouts.logged',
                'home',
                'incs.header-home',
                'incs.header-logged',
                'incs.footer-home',
                'incs.footer-logged',
                'incs.admin-message'
            ],
            SettingsComposer::class
        );

        View::composer(
            'incs.side-logged',
            SideSettingsComposer::class
        );
    }
}
