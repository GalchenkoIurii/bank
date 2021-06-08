<?php


namespace App\Http\View\Composers;


use App\Models\Card;
use App\Models\Setting;
use Illuminate\View\View;

class SideSettingsComposer
{
    protected $settings;
    protected $cards;

    public function __construct()
    {
        $this->settings = Setting::all();
        $this->cards = Card::all();
    }

    public function compose(View $view)
    {
        $side_settings = [
            'site_name' => null,
            'gold_card' => null,
            'silver_card' => null,
            'card_owner' => 'Test Owner',
            'show_card' => 1,
            'bank' => null,
            'personal_code' => null,
            'iban' => null,
            'swift' => null,
            'balance_rur' => 'test',
            'balance_usd' => 'test',
            'balance_eur' => 'test',
            'usd' => 'test',
            'eur' => 'test',
        ];

        foreach($this->settings as $setting) {
            if (array_key_exists($setting->slug, $side_settings)) {
                $side_settings[$setting->slug] = $setting;
            }
        }

        foreach($this->cards as $card) {
            if($card->privilege_type == 'Gold') {
                $side_settings['gold_card'] = $card;
            } elseif ($card->privilege_type == 'Silver') {
                $side_settings['silver_card'] = $card;
            }
        }


        // need to implement:
        // getting card_owner and show_card settings
        // getting user's personal_code, iban and balances
        // getting currencies exchange rates


        $view->with('side_settings', $side_settings);
    }
}