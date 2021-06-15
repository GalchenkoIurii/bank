<?php


namespace App\Http\View\Composers;


use App\Models\Card;
use App\Models\Setting;
use App\Models\User;
use CentralBankRussian\ExchangeRate\CBRClient;
use CentralBankRussian\ExchangeRate\Exceptions\ExceptionIncorrectData;
use CentralBankRussian\ExchangeRate\Exceptions\ExceptionInvalidParameter;
use CentralBankRussian\ExchangeRate\ExchangeRate;
use DateTime;
use Illuminate\Support\Facades\Auth;
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
            'card_owner' => null,
            'show_card' => null,
            'bank' => null,
            'personal_code' => null,
            'iban' => null,
            'swift' => null,
            'balance_rur' => null,
            'balance_usd' => null,
            'balance_eur' => null,
            'usd_buy' => null,
            'usd_sell' => null,
            'eur_buy' => null,
            'eur_sell' => null,
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

        // getting card_owner and show_card settings
        $user = User::find(Auth::user()->id);
        if (!empty($user->first_name) && !empty($user->last_name)) {
            $side_settings['card_owner'] = $user->first_name . ' ' . $user->last_name;
        }
        $side_settings['show_card'] = $user->show_card;

        // getting user's personal_code, iban and balances
        $side_settings['personal_code_value'] = $side_settings['personal_code']->value_lt . $user->userData->personal_code;
        $side_settings['iban_value'] = $side_settings['iban']->value_lt . $user->userData->iban;

        $side_settings['balance_rur'] = $user->balance->balance_rur;
        $side_settings['balance_usd'] = $user->balance->balance_usd;
        $side_settings['balance_eur'] = $user->balance->balance_eur;

        // getting currencies exchange rates
        $exchangeRate = new ExchangeRate(new CBRClient());

        try {
            $currencyRate = $exchangeRate
                ->setDate(new DateTime());

            $usd = $currencyRate->getRateInRubles('USD');
            $eur = $currencyRate->getRateInRubles('EUR');

            $side_settings['usd_buy'] = round($usd - ($usd * (1 / 100)), 2);
            $side_settings['usd_sell'] = round($usd + ($usd * (1 / 100)), 2);
            $side_settings['eur_buy'] = round($eur - ($eur * (1 / 100)), 2);
            $side_settings['eur_sell'] = round($eur + ($eur * (1 / 100)), 2);
        }
        catch (ExceptionIncorrectData | ExceptionInvalidParameter $e) {
            return response()->json([
                'errorCurrency' => $e->getMessage()
            ]);
        }

        $view->with('side_settings', $side_settings);
    }
}