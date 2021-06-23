<?php

namespace App\Http\Controllers;

use App\Models\Blank;
use App\Models\Check;
use App\Models\Credit;
use App\Models\CreditSetting;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Setting;
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
        $user = User::with(['balance', 'operations' => function ($query) {
            $query->latest();
        }])->find(Auth::id());

        $balance_rur = round($user->balance->balance_rur, 2);
        $balance_usd = round($user->balance->balance_usd, 2);
        $balance_eur = round($user->balance->balance_eur, 2);

        $operations = $user->operations;

        return view(
            'finances',
            compact('balance_rur', 'balance_usd', 'balance_eur', 'operations')
        );
    }

    public function lending()
    {
        $user_credits_reviewing = Credit::where([
            ['user_id', '=', Auth::id()],
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

        $data['user_id'] = ($data['user_id'] == Auth::id()) ? $data['user_id'] : Auth::id();

        Credit::create($data);

        $notice_blank = Blank::where('slug', 'credit_request_sent')->first();
        $notice = [
            'title_lt' => $notice_blank->title_lt,
            'text_lt' => $notice_blank->text_lt,
            'user_id' => Auth::id()
        ];
        Notice::create($notice);

        return redirect()->route('lending')->with('success', 'Заявка отправлена на проверку');
    }

    public function creditAgreement($id)
    {
        $credit_info = Credit::findOrFail($id);

        return view('credit-agreement', compact('credit_info'));
    }

    public function check($id)
    {
        $site_settings = Setting::whereIn('slug', ['site_name', 'address', 'email', 'tel'])->get();

        $settings = [
            'site_name' => null,
            'tel' => null,
            'email' => null,
            'address' => null,
        ];

        foreach($site_settings as $site_setting) {
            if (array_key_exists($site_setting->slug, $settings)) {
                $settings[$site_setting->slug] = $site_setting;
            }
        }

        $settings['check_info'] = Check::with('operation')->findOrFail($id);

        return view('check', $settings);
    }

    public function services()
    {
        return view('services');
    }

    public function convert()
    {
        if (auth()->check()) {
            $user = User::find(Auth::id());

            if ($user->is_banned) {
                return redirect()->route('logout');
            }
        }

        return view('convert', compact('user'));
    }

    public function investments()
    {
        return view('investments');
    }

    public function profile()
    {
        $user = User::find(Auth::id());
        $balance = $user->balance;

        $is_user_confirmed = ($user->confirmed) ? true : false;
        $is_positive_balance = ($balance->balance_rur > 0
            || $balance->balance_usd > 0
            || $balance->balance_eur > 0)
            ? true : false;

        return view('profile', compact('is_user_confirmed', 'is_positive_balance'));
    }

    public function notices()
    {
        $notices = Notice::where('user_id', Auth::id())->latest()->get();
        Notice::where('user_id', Auth::id())->update(['status' => 1]);

        return view('notices', compact('notices'));
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
