<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blank;
use App\Models\Check;
use App\Models\Notice;
use App\Models\Operation;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add($id)
    {
        $customer = User::with(['balance', 'userData'])->find($id);
        $personal_code = Setting::where('slug', 'personal_code')->first()->value_lt;
        $blanks = Blank::all();

        return view('admin.balances-add', compact('customer', 'personal_code', 'blanks'));
    }

    public function sub($id)
    {
        $customer = User::with(['balance', 'userData'])->find($id);
        $personal_code = Setting::where('slug', 'personal_code')->first()->value_lt;
        $blanks = Blank::all();

        return view('admin.balances-sub', compact('customer', 'personal_code', 'blanks'));
    }

    public function addUpdate(Request $request, $id)
    {
        $customer = User::with('balance')->findOrFail($id);
        $requestData = $request->all();

        $balances = [];
        $balances['balance_rur'] = round((float) $customer->balance->balance_rur, 2);
        $balances['balance_usd'] = round((float) $customer->balance->balance_usd, 2);
        $balances['balance_eur'] = round((float) $customer->balance->balance_eur, 2);


        if (isset($requestData['balance_rur'])) {
            $balances['balance_rur'] += round((float) $requestData['balance_rur'], 2);

            $operation_data = [
                'title_lt' => $requestData['title'],
                'description_lt' => $requestData['text'],
                'type' => 'balance_add',
                'sum' => round((float) $requestData['balance_rur'], 2),
                'currency' => 'RUB',
                'user_id' => $customer->id
            ];
            $operation = Operation::create($operation_data);

            $operation->check()->create([
                'title_lt' => $requestData['title'],
                'sum' => round((float) $requestData['balance_rur'], 2),
            ]);

            $notice_text = $requestData['text'] . ' ' . round((float) $requestData['balance_rur'], 2) . ' RUB. <br>'
                . ' <a href="' . route('check', ['id' => $operation->check->id])
                . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
            $notice = [
                'title_lt' => $requestData['title'],
                'text_lt' => $notice_text,
                'user_id' => $customer->id
            ];
            Notice::create($notice);
        }
        if (isset($requestData['balance_usd'])) {
            $balances['balance_usd'] += round((float) $requestData['balance_usd'], 2);

            $operation_data = [
                'title_lt' => $requestData['title'],
                'description_lt' => $requestData['text'],
                'type' => 'balance_add',
                'sum' => round((float) $requestData['balance_usd'], 2),
                'currency' => 'USD',
                'user_id' => $customer->id
            ];
            $operation = Operation::create($operation_data);

            $operation->check()->create([
                'title_lt' => $requestData['title'],
                'sum' => round((float) $requestData['balance_usd'], 2),
            ]);

            $notice_text = $requestData['text'] . ' ' . round((float) $requestData['balance_usd'], 2) . ' USD. <br>'
                . ' <a href="' . route('check', ['id' => $operation->check->id])
                . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
            $notice = [
                'title_lt' => $requestData['title'],
                'text_lt' => $notice_text,
                'user_id' => $customer->id
            ];
            Notice::create($notice);
        }
        if (isset($requestData['balance_eur'])) {
            $balances['balance_eur'] += round((float) $requestData['balance_eur'], 2);

            $operation_data = [
                'title_lt' => $requestData['title'],
                'description_lt' => $requestData['text'],
                'type' => 'balance_add',
                'sum' => round((float) $requestData['balance_eur'], 2),
                'currency' => 'EUR',
                'user_id' => $customer->id
            ];
            $operation = Operation::create($operation_data);

            $operation->check()->create([
                'title_lt' => $requestData['title'],
                'sum' => round((float) $requestData['balance_eur'], 2),
            ]);

            $notice_text = $requestData['text'] . ' ' . round((float) $requestData['balance_eur'], 2) . ' EUR. <br>'
                . ' <a href="' . route('check', ['id' => $operation->check->id])
                . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
            $notice = [
                'title_lt' => $requestData['title'],
                'text_lt' => $notice_text,
                'user_id' => $customer->id
            ];
            Notice::create($notice);
        }

        $customer->balance()->update($balances);

        return redirect()->route('admin.balance.add', ['id' => $id])->with('success', 'Баланс пополнен');
    }

    public function subUpdate(Request $request, $id)
    {
        $customer = User::with('balance')->findOrFail($id);
        $requestData = $request->all();

        $balances = [];
        $balances['balance_rur'] = round((float) $customer->balance->balance_rur, 2);
        $balances['balance_usd'] = round((float) $customer->balance->balance_usd, 2);
        $balances['balance_eur'] = round((float) $customer->balance->balance_eur, 2);


        if (isset($requestData['balance_rur'])) {
            $balances['balance_rur'] -= round((float) $requestData['balance_rur'], 2);
            if ($balances['balance_rur'] < 0) {
                return back()->with('error', 'Сумма списания превышает сумму баланса');
            } else {
                $operation_data = [
                    'title_lt' => $requestData['title'],
                    'description_lt' => $requestData['text'],
                    'type' => 'balance_sub',
                    'sum' => round((float) $requestData['balance_rur'], 2),
                    'currency' => 'RUB',
                    'user_id' => $customer->id
                ];
                $operation = Operation::create($operation_data);

                $operation->check()->create([
                    'title_lt' => $requestData['title'],
                    'sum' => round((float) $requestData['balance_rur'], 2),
                ]);

                $notice_text = $requestData['text']  . ' ' . round((float) $requestData['balance_rur'], 2) . ' RUB. <br>'
                    . ' <a href="' . route('check', ['id' => $operation->check->id])
                    . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
                $notice = [
                    'title_lt' => $requestData['title'],
                    'text_lt' => $notice_text,
                    'user_id' => $customer->id
                ];
                Notice::create($notice);
            }
        }
        if (isset($requestData['balance_usd'])) {
            $balances['balance_usd'] -= round((float) $requestData['balance_usd'], 2);
            if ($balances['balance_usd'] < 0) {
                return back()->with('error', 'Сумма списания превышает сумму баланса');
            } else {
                $operation_data = [
                    'title_lt' => $requestData['title'],
                    'description_lt' => $requestData['text'],
                    'type' => 'balance_sub',
                    'sum' => round((float) $requestData['balance_usd'], 2),
                    'currency' => 'USD',
                    'user_id' => $customer->id
                ];
                $operation = Operation::create($operation_data);

                $operation->check()->create([
                    'title_lt' => $requestData['title'],
                    'sum' => round((float) $requestData['balance_usd'], 2),
                ]);

                $notice_text = $requestData['text'] . ' ' . round((float) $requestData['balance_usd'], 2) . ' USD. <br>'
                    . ' <a href="' . route('check', ['id' => $operation->check->id])
                    . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
                $notice = [
                    'title_lt' => $requestData['title'],
                    'text_lt' => $notice_text,
                    'user_id' => $customer->id
                ];
                Notice::create($notice);
            }
        }
        if (isset($requestData['balance_eur'])) {
            $balances['balance_eur'] -= round((float) $requestData['balance_eur'], 2);
            if ($balances['balance_eur'] < 0) {
                return back()->with('error', 'Сумма списания превышает сумму баланса');
            } else {
                $operation_data = [
                    'title_lt' => $requestData['title'],
                    'description_lt' => $requestData['text'],
                    'type' => 'balance_sub',
                    'sum' => round((float) $requestData['balance_eur'], 2),
                    'currency' => 'EUR',
                    'user_id' => $customer->id
                ];
                $operation = Operation::create($operation_data);

                $operation->check()->create([
                    'title_lt' => $requestData['title'],
                    'sum' => round((float) $requestData['balance_eur'], 2),
                ]);

                $notice_text = $requestData['text'] . ' ' . round((float) $requestData['balance_eur'], 2) . ' EUR. <br>'
                    . ' <a href="' . route('check', ['id' => $operation->check->id])
                    . '" target="_blank"><strong>Квитанция транзакции</strong></a>';
                $notice = [
                    'title_lt' => $requestData['title'],
                    'text_lt' => $notice_text,
                    'user_id' => $customer->id
                ];
                Notice::create($notice);
            }
        }

        $customer->balance()->update($balances);

        return redirect()->route('admin.balance.sub', ['id' => $id])->with('success', 'Списание с баланса проведено');
    }
}
