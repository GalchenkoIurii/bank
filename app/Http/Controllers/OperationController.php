<?php

namespace App\Http\Controllers;

use App\Models\Blank;
use App\Models\Notice;
use App\Models\Operation;
use App\Models\Traits\LocalizationTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    use LocalizationTrait;

    public function storeOperation(Request $request)
    {
        $user = User::find(Auth::id());

        $locale = $this->getCurrentLocale();

        if (!$user->withdrawable) {
            return back()->with('error', __('main.withdraw_prohibited'));
        }

        $request->validate([
            'title_' . $locale => 'required',
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

        $notice_message = '';
        if (isset($data['number'])) {
            $notice_message .= __('main.transfers.to_account') . $data['number'] . '.';
        } elseif (isset($data['phone'])) {
            $notice_message .= __('main.transfers.to_phone') . $data['phone'] . '.';
        }

        $notice_blank = Blank::where('slug', 'balance_sub')->first();

        $data['description_lt'] = $notice_message;

        if ($data['currency'] == 'RUB') {
            if ($balances['balance_rur'] < $data['sum']) {
                return back()->with('error', __('main.sum_exceeds_balance'));
            } else {
                $balances['balance_rur'] -= $data['sum'];

                $operation = Operation::create($data);

                $operation->check()->create([
                    'title_' . $locale => $notice_blank->__('title'),
                    'sum' => $data['sum'],
                ]);

                $notice_text = $notice_blank->__('text') . ' ' . $data['sum'] . ' RUB. <br>'
                    . $notice_message
                    . ' <a href="' . route('check', ['id' => $operation->check->id])
                    . '" target="_blank"><strong>' . __('transaction_receipt') . '</strong></a>';
                $notice = [
                    'title_' . $locale => $notice_blank->__('title'),
                    'text_' . $locale => $notice_text,
                    'user_id' => $user->id
                ];
                Notice::create($notice);
            }
        } elseif ($data['currency'] == 'USD') {
            if ($balances['balance_usd'] < $data['sum']) {
                return back()->with('error', __('main.sum_exceeds_balance'));
            } else {
                $balances['balance_usd'] -= $data['sum'];

                $operation = Operation::create($data);

                $operation->check()->create([
                    'title_' . $locale => $notice_blank->__('title'),
                    'sum' => $data['sum'],
                ]);

                $notice_text = $notice_blank->__('text') . ' ' . $data['sum'] . ' USD. <br>'
                    . $notice_message
                    . ' <a href="' . route('check', ['id' => $operation->check->id])
                    . '" target="_blank"><strong>' . __('transaction_receipt') . '</strong></a>';
                $notice = [
                    'title_' . $locale => $notice_blank->__('title'),
                    'text_' . $locale => $notice_text,
                    'user_id' => $user->id
                ];
                Notice::create($notice);
            }
        } elseif ($data['currency'] == 'EUR') {
            if ($balances['balance_eur'] < $data['sum']) {
                return back()->with('error', __('main.sum_exceeds_balance'));
            } else {
                $balances['balance_eur'] -= $data['sum'];

                $operation = Operation::create($data);

                $operation->check()->create([
                    'title_' . $locale => $notice_blank->__('title'),
                    'sum' => $data['sum'],
                ]);

                $notice_text = $notice_blank->__('text') . ' ' . $data['sum'] . ' EUR. <br>'
                    . $notice_message
                    . ' <a href="' . route('check', ['id' => $operation->check->id])
                    . '" target="_blank"><strong>' . __('transaction_receipt') . '</strong></a>';
                $notice = [
                    'title_' . $locale => $notice_blank->__('title'),
                    'text_' . $locale => $notice_text,
                    'user_id' => $user->id
                ];
                Notice::create($notice);
            }
        }

        $user->balance()->update($balances);

        return back()->with('success', __('main.operation_success'));
    }
}
