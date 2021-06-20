<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    public function storeOperation(Request $request)
    {
        $user = User::find(Auth::id());

        if (!$user->withdrawable) {
            return back()->with('error', 'Вывод средств запрещен, обратитесь в службу поддержки');
        }

        $request->validate([
            'title_lt' => 'required',
            'type' => 'required',
            'sum' => 'required',
            'currency' => 'required'
        ]);

        $data = $request->all();

        $data['user_id'] = $user->id;
        $data['sum'] = round((float) $data['sum'], 2);

        $balances = [];
        $balances['balance_rur'] = (float) $user->balance->balance_rur;
        $balances['balance_usd'] = (float) $user->balance->balance_usd;
        $balances['balance_eur'] = (float) $user->balance->balance_eur;


        // notice message
        $notice_message = '';
        if (isset($data['number'])) {
            $notice_message .= 'Перевод на счет/карту № ' . $data['number'] . '.';
        } elseif (isset($data['phone'])) {
            $notice_message .= 'Пополнение по номеру телефона ' . $data['phone'] . '.';
        }

        if ($data['currency'] == 'RUB') {
            if ($balances['balance_rur'] < $data['sum']) {
                return back()->with('error', 'Сумма списания превышает сумму баланса');
            } else {
                $balances['balance_rur'] -= $data['sum'];

                // need to implement: notices and checks
//                $notice_blank = Blank::where('slug', 'balance_sub')->first();
//
//                $check = Check::create([
//                    'title' => $notice_blank->title,
//                    'sum' => $data['sum'] . ' RUB',
//                    'user_id' => $user->id
//                ]);

//                $notice_text = $notice_blank->text . ' ' . $data['sum'] . ' RUB. <br>'
//                    . $notice_message
//                    . ' <a href="' . route('check', ['id' => $check->id])
//                    . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                $notice = [
//                    'title' => $notice_blank->title,
//                    'text' => $notice_text,
//                    'user_id' => $user->id
//                ];
//                Notice::create($notice);


                $data['description_lt'] = $notice_message;
                Operation::create($data);
            }
        } elseif ($data['currency'] == 'USD') {
            if ($balances['balance_usd'] < $data['sum']) {
                return back()->with('error', 'Сумма списания превышает сумму баланса');
            } else {
                $balances['balance_usd'] -= $data['sum'];

                // need to implement: notices and checks
//                $notice_blank = Blank::where('slug', 'balance_sub')->first();
//
//                $check = Check::create([
//                    'title' => $notice_blank->title,
//                    'sum' => $data['sum'] . ' USD',
//                    'user_id' => $user->id
//                ]);
//
//                $notice_text = $notice_blank->text . ' ' . $data['sum'] . ' USD. <br>'
//                    . $notice_message
//                    . ' <a href="' . route('check', ['id' => $check->id])
//                    . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                $notice = [
//                    'title' => $notice_blank->title,
//                    'text' => $notice_text,
//                    'user_id' => $user->id
//                ];
//                Notice::create($notice);

                $data['description_lt'] = $notice_message;
                Operation::create($data);
            }
        } elseif ($data['currency'] == 'EUR') {
            if ($balances['balance_eur'] < $data['sum']) {
                return back()->with('error', 'Сумма списания превышает сумму баланса');
            } else {
                $balances['balance_eur'] -= $data['sum'];

                // need to implement: notices and checks
//                $notice_blank = Blank::where('slug', 'balance_sub')->first();
//
//                $check = Check::create([
//                    'title' => $notice_blank->title,
//                    'sum' => $data['sum'] . ' EUR',
//                    'user_id' => $user->id
//                ]);
//
//                $notice_text = $notice_blank->text . ' ' . $data['sum'] . ' EUR. <br>'
//                    . $notice_message
//                    . ' <a href="' . route('check', ['id' => $check->id])
//                    . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
//                $notice = [
//                    'title' => $notice_blank->title,
//                    'text' => $notice_text,
//                    'user_id' => $user->id
//                ];
//                Notice::create($notice);

                $data['description_lt'] = $notice_message;
                Operation::create($data);
            }
        }

        $user->balance()->update($balances);

        return back()->with('success', 'Операция проведена успешно');
    }
}
