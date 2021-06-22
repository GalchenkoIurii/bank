<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blank;
use App\Models\Credit;
use App\Models\Notice;
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


        // need to implement Notices and Blanks

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

            $notice_text = $notice_blank->text_lt . ' на сумму: ' . $data['credit_sum']
                . '. <a href="' . route('credit.agreement', ['id' => $id])
                . '" target="_blank"><strong>Подробности моего кредита</strong></a>';
            $notice = [
                'title' => $notice_blank->title,
                'text' => $notice_text,
                'user_id' => $credit['user_id']
            ];
            Notice::create($notice);

            $blank_balance_add = Blank::where('slug', 'balance_add')->first();
            $operation = [
                'title' => $blank_balance_add->title,
                'description' => $blank_balance_add->text,
                'sum' => $data['credit_sum'] . ' RUB',
                'user_id' => $credit['user_id']
            ];
            Operation::create($operation);
        }

        $credit->update($data);

        return redirect()->route('admin.credits.edit', ['credit' => $id])->with('success', 'Данные сохранены');
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
        return redirect()->route('admin.credits.index')->with('success', 'Заявка удалена');
    }
}
