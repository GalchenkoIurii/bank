<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\CreditSetting;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function finances()
    {
        $balance_rur = Auth::user()->balance->balance_rur;
        $balance_usd = Auth::user()->balance->balance_usd;
        $balance_eur = Auth::user()->balance->balance_eur;
        $operations = null;


        // need to implement:
        // getting user's operations


        return view(
            'finances',
            compact('balance_rur', 'balance_usd', 'balance_eur', 'operations')
        );
    }

    public function lending()
    {
        $user_credits_reviewing = Credit::where([
            ['user_id', '=', Auth::user()->id],
            ['reviewing', '=', 1]
        ])->get();
        $has_reviewing_credits = false;

        if ($user_credits_reviewing->count()) {
            $has_reviewing_credits = true;
        }

        $credits = CreditSetting::all();

        return view('lending', compact('has_reviewing_credits', 'credits'));
    }

    public function creditInfo()
    {
        return view('credit-info');
    }

    public function credit($category)
    {
        $credit = CreditSetting::where('category_slug', $category)->firstOrFail();

        return view('credit', compact('credit'));
    }

    public function creditStore(Request $request)
    {
        $request->validate([
            'credit_setting_id' => 'required',
            'credit_sum' => 'required',
            'credit_term' => 'required',
            'percent' => 'required',
            'monthly_payment' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->all();

        $data['user_id'] = ($data['user_id'] == Auth::user()->id) ? $data['user_id'] : Auth::user()->id;

        Credit::create($data);

        // need to implement Blanks and Notices logic
//        $notice_blank = Blank::where('slug', 'credit_request_sent')->first();
//        $notice = [
//            'title' => $notice_blank->title,
//            'text' => $notice_blank->text,
//            'user_id' => Auth::user()->id
//        ];
//        Notice::create($notice);

        return redirect()->route('lending')->with('success', 'Заявка отправлена на проверку');
    }

    public function creditAgreement($id)
    {
        $credit_info = Credit::findOrFail($id);

        return view('credit-agreement', compact('credit_info'));
    }

    public function services()
    {
        return view('services');
    }

    public function convert()
    {
        if (auth()->check()) {
            $user = User::find(Auth::user()->id);

            if ($user->is_banned) {
                return redirect()->route('logout');
            }
        }

        return view('convert', compact('user'));
    }




    public function about()
    {
        $page_data = Page::where('slug', 'about')->first();
        return view('about', compact('page_data'));
    }

    public function agreement()
    {
        $page_data = Page::where('slug', 'agreement')->first();
        return view('agreement', compact('page_data'));
    }

    public function business()
    {
        $page_data = Page::where('slug', 'business')->first();
        return view('business', compact('page_data'));
    }

    public function confidentiality()
    {
        $page_data = Page::where('slug', 'confidentiality')->first();
        return view('confidentiality', compact('page_data'));
    }
}
