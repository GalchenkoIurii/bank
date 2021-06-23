<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blank;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::with(['balance', 'userData'])->orderByDesc('updated_at')->get();
        $personal_code = Setting::where('slug', 'personal_code')->first()->value_lt;

        return view('admin.customers', compact('customers', 'personal_code'));
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
        $customer = User::with(['balance', 'userData', 'notices'])->findOrFail($id);
        $personal_code = Setting::where('slug', 'personal_code')->first()->value_lt;

        return view('admin.customers-edit', compact('customer', 'personal_code'));
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
            'login' => $data['login'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ];
        $balance_data = [];

        if (isset($data['is_admin'])) {
            $customer_data['is_admin'] = 1;
        } else {
            $customer_data['is_admin'] = 0;
        }

        if (isset($data['is_banned'])) {
            $customer_data['is_banned'] = 1;
        } else {
            $customer_data['is_banned'] = 0;
        }

        if ($customer->confirmed) {
            if (isset($data['withdrawable']) && !$customer->withdrawable) {
                $customer_data['withdrawable'] = 1;

                $notice_blank = Blank::where('slug', 'withdraw_permitted')->first();
                $notice = [
                    'title_lt' => $notice_blank->title_lt,
                    'text_lt' => $notice_blank->text_lt,
                    'user_id' => $id
                ];
                Notice::create($notice);

            } elseif (!isset($data['withdrawable']) && $customer->withdrawable) {
                $customer_data['withdrawable'] = 0;

                $notice_blank = Blank::where('slug', 'withdraw_deny')->first();
                $notice = [
                    'title_lt' => $notice_blank->title_lt,
                    'text_lt' => $notice_blank->text_lt,
                    'user_id' => $id
                ];
                Notice::create($notice);

            } else {
                $customer_data['withdrawable'] = $customer->withdrawable;
            }
        } else {
            if (isset($data['withdrawable'])) {
                $customer_data['withdrawable'] = 1;
            } else {
                $customer_data['withdrawable'] = 0;
            }
        }

        if (isset($data['show_card'])) {
            $customer_data['show_card'] = 1;
        } else {
            $customer_data['show_card'] = 0;
        }

        if (isset($data['identifying_refuse'])) {
            $customer_data['confirmed'] = 0;
            $customer_data['confirmation'] = 0;
            $customer_data['need_confirmation'] = 1;

            $notice_blank = Blank::where('slug', 'identifying_refuse')->first();
            $notice = [
                'title_lt' => $notice_blank->title_lt,
                'text_lt' => $notice_blank->text_lt,
                'user_id' => $id
            ];
            Notice::create($notice);
        }

        if (isset($data['control_sum_lt'])) {
            $balance_data['control_sum_lt'] = $data['control_sum_lt'];
        }

        $customer->update($customer_data);
        if (!empty($balance_data)) {
            $customer->balance()->update($balance_data);
        }

        return redirect()->route('admin.customers.edit', ['customer' => $id])->with('success', 'Данные сохранены');
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
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Клиент удален');
    }
}
