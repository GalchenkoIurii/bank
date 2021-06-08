<?php


namespace App\Http\View\Composers;


use App\Models\Setting;
use Illuminate\View\View;

class SettingsComposer
{
    protected $settings;

    public function __construct()
    {
        $this->settings = Setting::all();
    }

    public function compose(View $view)
    {
        $site_name = '';
        $site_slogan = '';
        $copyright = '';
        $tel = '';
        $email = '';
        $time = '';
        $address = '';

        foreach($this->settings as $setting) {
            if($setting->slug == 'site_name') {
                $site_name = $setting;
            } elseif ($setting->slug == 'site_slogan') {
                $site_slogan = $setting;
            } elseif ($setting->slug == 'tel') {
                $tel = $setting;
            } elseif ($setting->slug == 'email') {
                $email = $setting;
            } elseif ($setting->slug == 'time') {
                $time = $setting;
            } elseif ($setting->slug == 'address') {
                $address = $setting;
            } elseif ($setting->slug == 'copyright') {
                $copyright = $setting;
            }
        }

        $view->with(
            'site_settings',
            compact('site_name', 'site_slogan', 'copyright', 'tel', 'email', 'time', 'address')
        );
    }
}