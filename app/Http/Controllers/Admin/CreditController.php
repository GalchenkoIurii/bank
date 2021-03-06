<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blank;
use App\Models\Credit;
use App\Models\Notice;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = Credit::with('creditSetting')->orderByDesc('id')->get();

        return view('admin.credits', compact('credits'));
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
        $credit = Credit::findOrFail($id);

        $credit_agreement = Blank::where('slug', 'credit_agreement')->first();
        $payments_table = Blank::where('slug', 'payments_table')->first();

        return view('admin.credits-edit', compact('credit', 'credit_agreement', 'payments_table'));
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
        $request->validate([
            'result' => 'required'
        ]);

        $data = $request->all();

        $credit = Credit::findOrFail($id);

        if ($data['result'] === '0') {
            $data['reviewing'] = 0;

            $notice_blank = Blank::where('slug', 'credit_refused')->first();

            $notice = [
                'title_lt' => $notice_blank->title_lt,
                'text_lt' => $notice_blank->text_lt,
                'user_id' => $credit['user_id']
            ];
            Notice::create($notice);

        } elseif ($data['result'] === '1') {
            $data['reviewing'] = 0;

            $user = User::findOrFail($credit['user_id']);

            $balance['balance_rur'] = round((float) $user->balance->balance_rur, 2);
            $balance['balance_rur'] += round((float) $data['credit_sum'], 2);

            $user->balance()->update($balance);

            $notice_blank = Blank::where('slug', 'credit_approved')->first();

            $notice_text = $notice_blank->text_lt . ' ???? ??????????: ' . $data['credit_sum']
                . '. <a href="' . route('credit.agreement', ['id' => $id])
                . '" target="_blank"><strong>?????????????????????? ?????????? ??????????????</strong></a>';
            $notice = [
                'title_lt' => $notice_blank->title_lt,
                'text_lt' => $notice_text,
                'user_id' => $credit['user_id']
            ];
            Notice::create($notice);

            $blank_balance_add = Blank::where('slug', 'balance_add')->first();
            $operation_data = [
                'title_lt' => $blank_balance_add->title_lt,
                'description_lt' => $blank_balance_add->text_lt,
                'type' => 'credit',
                'sum' => $data['credit_sum'],
                'currency' => 'RUB',
                'user_id' => $credit['user_id']
            ];
            $operation = Operation::create($operation_data);

            $operation->check()->create([
                'title_lt' => $blank_balance_add->title_lt,
                'sum' => round((float) $data['credit_sum'], 2),
            ]);
        }

        $credit->update($data);

        return redirect()->route('admin.credits.edit', ['credit' => $id])->with('success', '???????????? ??????????????????');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credit = Credit::findOrFail($id);
        $credit->delete();
        return redirect()->route('admin.credits.index')->with('success', '???????????? ??????????????');
    }
}
