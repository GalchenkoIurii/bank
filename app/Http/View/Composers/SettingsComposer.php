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
        $settings = [
            'site_name' => null,
            'site_slogan' => null,
            'copyright' => null,
            'tel' => null,
            'email' => null,
            'time' => null,
            'address' => null,
            'user_notices' => null,
            'admin_message' => null,
            ];

        foreach($this->settings as $setting) {
            if (array_key_exists($setting->slug, $settings)) {
                $settings[$setting->slug] = $setting;
            }
        }


        // need to implement:
        // getting user's notices


        $view->with('site_settings', $settings);
    }
}