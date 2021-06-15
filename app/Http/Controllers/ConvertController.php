<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\User;
use CentralBankRussian\ExchangeRate\CBRClient;
use CentralBankRussian\ExchangeRate\Exceptions\ExceptionIncorrectData;
use CentralBankRussian\ExchangeRate\Exceptions\ExceptionInvalidParameter;
use CentralBankRussian\ExchangeRate\ExchangeRate;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConvertController extends Controller
{
    public function handle(Request $request)
    {
        $first_currency_sum = (float)$request->input('first_currency_sum');
        $first_currency = $request->input('first_currency');
        $second_currency = $request->input('second_currency');
        $second_currency_sum = null;

        if ($first_currency == $second_currency) {
            return response()->json([
                "errorSameCurrency" => "Валюты не должны быть одинаковыми, выберите другую валюту"
            ]);
        }

        $exchangeRate = new ExchangeRate(new CBRClient());

        try {
            $currencyRate = $exchangeRate
                ->setDate(new DateTime())
                ->getCurrencyExchangeRates();

            $rub_usd = $currencyRate->getCurrencyRateBySymbolCode('USD')
                ->getExchangeRate();
            $rub_eur = $currencyRate->getCurrencyRateBySymbolCode('EUR')
                ->getExchangeRate();

        }
        catch (ExceptionIncorrectData | ExceptionInvalidParameter $e) {
            return response()->json([
                "errorCurrency" => $e->getMessage()
            ]);
        }

        $usd_rub = 1 / $rub_usd;
        $eur_rub = 1 / $rub_eur;
        $usd_eur = $rub_eur / $rub_usd;
        $eur_usd = $rub_usd / $rub_eur;

        switch ($first_currency) {
            case 'RUB':
                if ($second_currency == 'USD') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $rub_usd);
                } elseif ($second_currency == 'EUR') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $rub_eur);
                }
                break;
            case 'USD':
                if ($second_currency == 'RUB') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $usd_rub);
                } elseif ($second_currency == 'EUR') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $usd_eur);
                }
                break;
            case 'EUR':
                if ($second_currency == 'RUB') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $eur_rub);
                } elseif ($second_currency == 'USD') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $eur_usd);
                }
                break;
        }

        return response()->json([
            "second_currency_sum" => round($second_currency_sum, 2)
        ]);
    }

    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $requestData = $request->all();

        $balances = [];
        $balances['balance_rur'] = round((float) $user->balance->balance_rur, 2);
        $balances['balance_usd'] = round((float) $user->balance->balance_usd, 2);
        $balances['balance_eur'] = round((float) $user->balance->balance_eur, 2);

        // need to implement notices
//        $notice_blank_balance_sub = Blank::where('slug', 'balance_sub')->first();
//        $notice_blank_balance_add = Blank::where('slug', 'balance_add')->first();
//        $notice_blank_convert = Blank::where('slug', 'convert')->first();

        $first_currency_sum = round((float)$requestData['first_currency_sum'], 2);
        $first_currency = $requestData['first_currency'];
        $second_currency = $requestData['second_currency'];
        $second_currency_sum = null;

        if ($first_currency == $second_currency) {
            return response()->json([
                'errorSameCurrency' => 'Валюты не должны быть одинаковыми, выберите другую валюту'
            ]);
        } elseif (empty($first_currency_sum)) {
            return back()->with('error', 'Введите сумму');
        }

        $exchangeRate = new ExchangeRate(new CBRClient());

        try {
            $currencyRate = $exchangeRate
                ->setDate(new DateTime())
                ->getCurrencyExchangeRates();

            $rub_usd = $currencyRate->getCurrencyRateBySymbolCode('USD')
                ->getExchangeRate();
            $rub_eur = $currencyRate->getCurrencyRateBySymbolCode('EUR')
                ->getExchangeRate();

        }
        catch (ExceptionIncorrectData | ExceptionInvalidParameter $e) {
            return response()->json([
                "errorCurrency" => $e->getMessage()
            ]);
        }

        $usd_rub = 1 / $rub_usd;
        $eur_rub = 1 / $rub_eur;
        $usd_eur = $rub_eur / $rub_usd;
        $eur_usd = $rub_usd / $rub_eur;

        switch ($first_currency) {
            case 'RUB':
                if ($second_currency == 'USD') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $rub_usd);
                    $balances['balance_rur'] -= $first_currency_sum;
                    if ($balances['balance_rur'] < 0) {
                        return back()->with('error', 'Сумма списания превышает сумму баланса');
                    } else {
//                        $balances['balance_rur'] = (string) $balances['balance_rur'];
                        $balances['balance_usd'] += round($second_currency_sum, 2);
//                        $balances['balance_usd'] = (string) $balances['balance_usd'];

                        // need to implement checks, notices, operations
//                        $check = Check::create([
//                            'title' => $notice_blank_convert['title'],
//                            'sum' => $second_currency_sum . ' USD',
//                            'user_id' => $customer->id
//                        ]);

//                        $notice_text = $notice_blank_balance_sub->text . ' ' . $first_currency_sum . ' RUB <br>'
//                            . $notice_blank_balance_add->text . ' ' . $second_currency_sum . ' USD <br>'
//                            . '. <a href="' . route('check', ['id' => $check->id])
//                            . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                        $notice = [
//                            'title' => $notice_blank_convert['title'],
//                            'text' => $notice_text,
//                            'user_id' => $customer->id
//                        ];
//                        Notice::create($notice);
//
//                        $operation = [
//                            'title' => $notice_blank_convert['title'],
//                            'description' => $notice_blank_convert->text,
//                            'sum' => $second_currency_sum . ' USD',
//                            'user_id' => $customer->id
//                        ];
//                        Operation::create($operation);
                    }
                } elseif ($second_currency == 'EUR') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $rub_eur);
                    $balances['balance_rur'] -= $first_currency_sum;
                    if ($balances['balance_rur'] < 0) {
                        return back()->with('error', 'Сумма списания превышает сумму баланса');
                    } else {
//                        $balances['balance_rur'] = (string) $balances['balance_rur'];
                        $balances['balance_eur'] += round($second_currency_sum, 2);
//                        $balances['balance_eur'] = (string) $balances['balance_eur'];

                        // need to implement checks, notices, operations
//                        $check = Check::create([
//                            'title' => $notice_blank_convert['title'],
//                            'sum' => $second_currency_sum . ' EUR',
//                            'user_id' => $customer->id
//                        ]);
//
//                        $notice_text = $notice_blank_balance_sub->text . ' ' . $first_currency_sum . ' RUB <br>'
//                            . $notice_blank_balance_add->text . ' ' . $second_currency_sum . ' EUR <br>'
//                            . '. <a href="' . route('check', ['id' => $check->id])
//                            . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                        $notice = [
//                            'title' => $notice_blank_convert['title'],
//                            'text' => $notice_text,
//                            'user_id' => $customer->id
//                        ];
//                        Notice::create($notice);
//
//                        $operation = [
//                            'title' => $notice_blank_convert['title'],
//                            'description' => $notice_blank_convert->text,
//                            'sum' => $second_currency_sum . ' EUR',
//                            'user_id' => $customer->id
//                        ];
//                        Operation::create($operation);
                    }
                }
                break;
            case 'USD':
                if ($second_currency == 'RUB') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $usd_rub);
                    $balances['balance_usd'] -= $first_currency_sum;
                    if ($balances['balance_usd'] < 0) {
                        return back()->with('error', 'Сумма списания превышает сумму баланса');
                    } else {
//                        $balances['balance_usd'] = (string) $balances['balance_usd'];
                        $balances['balance_rur'] += round($second_currency_sum, 2);
//                        $balances['balance_rur'] = (string) $balances['balance_rur'];

                        // need to implement checks, notices, operations
//                        $check = Check::create([
//                            'title' => $notice_blank_convert['title'],
//                            'sum' => $second_currency_sum . ' RUB',
//                            'user_id' => $customer->id
//                        ]);
//
//                        $notice_text = $notice_blank_balance_sub->text . ' ' . $first_currency_sum . ' USD <br>'
//                            . $notice_blank_balance_add->text . ' ' . $second_currency_sum . ' RUB <br>'
//                            . '. <a href="' . route('check', ['id' => $check->id])
//                            . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                        $notice = [
//                            'title' => $notice_blank_convert['title'],
//                            'text' => $notice_text,
//                            'user_id' => $customer->id
//                        ];
//                        Notice::create($notice);
//
//                        $operation = [
//                            'title' => $notice_blank_convert['title'],
//                            'description' => $notice_blank_convert->text,
//                            'sum' => $second_currency_sum . ' RUB',
//                            'user_id' => $customer->id
//                        ];
//                        Operation::create($operation);
                    }
                } elseif ($second_currency == 'EUR') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $usd_eur);
                    $balances['balance_usd'] -= $first_currency_sum;
                    if ($balances['balance_usd'] < 0) {
                        return back()->with('error', 'Сумма списания превышает сумму баланса');
                    } else {
//                        $balances['balance_usd'] = (string) $balances['balance_usd'];
                        $balances['balance_eur'] += round($second_currency_sum, 2);
//                        $balances['balance_eur'] = (string) $balances['balance_eur'];

                        // need to implement checks, notices, operations
//                        $check = Check::create([
//                            'title' => $notice_blank_convert['title'],
//                            'sum' => $second_currency_sum . ' EUR',
//                            'user_id' => $customer->id
//                        ]);
//
//                        $notice_text = $notice_blank_balance_sub->text . ' ' . $first_currency_sum . ' USD <br>'
//                            . $notice_blank_balance_add->text . ' ' . $second_currency_sum . ' EUR <br>'
//                            . '. <a href="' . route('check', ['id' => $check->id])
//                            . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                        $notice = [
//                            'title' => $notice_blank_convert['title'],
//                            'text' => $notice_text,
//                            'user_id' => $customer->id
//                        ];
//                        Notice::create($notice);
//
//                        $operation = [
//                            'title' => $notice_blank_convert['title'],
//                            'description' => $notice_blank_convert->text,
//                            'sum' => $second_currency_sum . ' EUR',
//                            'user_id' => $customer->id
//                        ];
//                        Operation::create($operation);
                    }
                }
                break;
            case 'EUR':
                if ($second_currency == 'RUB') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $eur_rub);
                    $balances['balance_eur'] -= $first_currency_sum;
                    if ($balances['balance_eur'] < 0) {
                        return back()->with('error', 'Сумма списания превышает сумму баланса');
                    } else {
//                        $balances['balance_eur'] = (string) $balances['balance_eur'];
                        $balances['balance_rur'] += round($second_currency_sum, 2);
//                        $balances['balance_rur'] = (string) $balances['balance_rur'];

                        // need to implement checks, notices, operations
//                        $check = Check::create([
//                            'title' => $notice_blank_convert['title'],
//                            'sum' => $second_currency_sum . ' RUB',
//                            'user_id' => $customer->id
//                        ]);
//
//                        $notice_text = $notice_blank_balance_sub->text . ' ' . $first_currency_sum . ' EUR <br>'
//                            . $notice_blank_balance_add->text . ' ' . $second_currency_sum . ' RUB <br>'
//                            . '. <a href="' . route('check', ['id' => $check->id])
//                            . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                        $notice = [
//                            'title' => $notice_blank_convert['title'],
//                            'text' => $notice_text,
//                            'user_id' => $customer->id
//                        ];
//                        Notice::create($notice);
//
//                        $operation = [
//                            'title' => $notice_blank_convert['title'],
//                            'description' => $notice_blank_convert->text,
//                            'sum' => $second_currency_sum . ' RUB',
//                            'user_id' => $customer->id
//                        ];
//                        Operation::create($operation);
                    }
                } elseif ($second_currency == 'USD') {
                    $second_currency_sum = $this->exchangeCurrencies($first_currency_sum, $eur_usd);
                    $balances['balance_eur'] -= $first_currency_sum;
                    if ($balances['balance_eur'] < 0) {
                        return back()->with('error', 'Сумма списания превышает сумму баланса');
                    } else {
//                        $balances['balance_eur'] = (string) $balances['balance_eur'];
                        $balances['balance_usd'] += round($second_currency_sum, 2);
//                        $balances['balance_usd'] = (string) $balances['balance_usd'];

                        // need to implement checks, notices, operations
//                        $check = Check::create([
//                            'title' => $notice_blank_convert['title'],
//                            'sum' => $second_currency_sum . ' USD',
//                            'user_id' => $customer->id
//                        ]);
//
//                        $notice_text = $notice_blank_balance_sub->text . ' ' . $first_currency_sum . ' EUR <br>'
//                            . $notice_blank_balance_add->text . ' ' . $second_currency_sum . ' USD <br>'
//                            . '. <a href="' . route('check', ['id' => $check->id])
//                            . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                        $notice = [
//                            'title' => $notice_blank_convert['title'],
//                            'text' => $notice_text,
//                            'user_id' => $customer->id
//                        ];
//                        Notice::create($notice);
//
//                        $operation = [
//                            'title' => $notice_blank_convert['title'],
//                            'description' => $notice_blank_convert->text,
//                            'sum' => $second_currency_sum . ' USD',
//                            'user_id' => $customer->id
//                        ];
//                        Operation::create($operation);
                    }
                }
                break;
        }

        $res = Balance::where('user_id', $user->id)->update($balances);

        if ($res) {
            return redirect()->route('convert')->with('success', 'Конвертация проведена успешно');
        }

        return back()->with('error', 'Что-то пошло не так');
    }

    public function exchangeCurrencies($currency_sum, $exchange_rate)
    {
        return round($currency_sum / $exchange_rate, 2);
    }
}
