<?php


namespace App\Http\View\Composers;


use App\Models\Notice;
use App\Models\Setting;
use CentralBankRussian\ExchangeRate\CBRClient;
use CentralBankRussian\ExchangeRate\Exceptions\ExceptionIncorrectData;
use CentralBankRussian\ExchangeRate\Exceptions\ExceptionInvalidParameter;
use CentralBankRussian\ExchangeRate\ExchangeRate;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SettingsComposer
{
    protected $settings;
    protected $user_has_notices;

    public function __construct()
    {
        $this->settings = Setting::all();

        $notices = Notice::where('user_id', Auth::id())
            ->where('status', 0)->get();

        $this->user_has_notices = (count($notices)) ? true : false;

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
            'usd' => null,
            'eur' => null,
            ];

        foreach($this->settings as $setting) {
            if (array_key_exists($setting->slug, $settings)) {
                $settings[$setting->slug] = $setting;
            }
        }

        $exchangeRate = new ExchangeRate(new CBRClient());

        try {
            $currencyRate = $exchangeRate
                ->setDate(new DateTime());

            $settings['usd'] = round($currencyRate->getRateInRubles('USD'), 2);
            $settings['eur'] = round($currencyRate->getRateInRubles('EUR'), 2);
        }
        catch (ExceptionIncorrectData | ExceptionInvalidParameter $e) {
            return response()->json([
                'errorCurrency' => $e->getMessage()
            ]);
        }

        $settings['user_notices'] = $this->user_has_notices;

        $view->with('site_settings', $settings);
    }
}