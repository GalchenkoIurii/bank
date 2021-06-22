<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blank;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::with(['balance', 'userData'])->where('confirmation', 1)
            ->orderByDesc('updated_at')->get();
        $personal_code = Setting::where('slug', 'personal_code')->first()->value_lt;
        return view('admin.confirmations', compact('customers', 'personal_code'));
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
        $customer = User::findOrFail($id);
        return view('admin.confirmations-edit', compact('customer'));
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
        $data = $request->all();

        $customer = User::findOrFail($id);

        $customer_data = [
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'patronymic' => $data['patronymic'],
            'birth_date' => $data['birth_date'],
            'gender' => $data['gender'],
        ];
        $user_data = [
            'inn' => $data['inn'],
            'passport_num' => $data['passport_num'],
            'passport_issuer' => $data['passport_issuer'],
            'issue_date' => $data['issue_date'],
            'issuer_code' => $data['issuer_code'],
            'citizenship' => $data['citizenship'],
            'user_address' => $data['user_address'],
        ];

        if (isset($data['identified']) && !isset($data['identifying_refused'])) {
            $customer_data['confirmed'] = 1;
            $customer_data['confirmation'] = 0;

            $notice_blank = Blank::where('slug', 'identified')->first();

            $notice = [
                'title_lt' => $notice_blank->title_lt,
                'text_lt' => $notice_blank->text_lt,
                'user_id' => $id
            ];

            Notice::create($notice);

        } elseif (isset($data['identifying_refused'])) {
            $customer_data['confirmed'] = 0;
            $customer_data['confirmation'] = 0;
            $customer_data['need_confirmation'] = 1;

            $notice_blank = Blank::where('slug', 'identifying_refused')->first();

            $notice = [
                'title_lt' => $notice_blank->title_lt,
                'text_lt' => $notice_blank->text_lt,
                'user_id' => $id
            ];

            Notice::create($notice);

        }

        $customer->update($customer_data);
        $customer->userData()->update($user_data);

        return redirect()->route('admin.confirmations.edit', ['confirmation' => $id])->with('success', 'Данные сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::findOrFail($id);

        $customer_data = [
            'confirmed' => 0,
            'confirmation' => 0,
            'need_confirmation' => 1
        ];

        $notice_blank = Blank::where('slug', 'identifying_refused')->first();

        $notice = [
            'title_lt' => $notice_blank->title_lt,
            'text_lt' => $notice_blank->text_lt,
            'user_id' => $id
        ];

        Notice::create($notice);

        $customer->update($customer_data);

        return redirect()->route('admin.confirmations.index')->with('success', 'Заявка удалена');
    }
}
