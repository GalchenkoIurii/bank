<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'citizenship' => 'required',
            'password' => 'required|confirmed'
        ]);

        $ip_address = $_SERVER['REMOTE_ADDR'];

        $user = User::create([
            'login' => $request->login,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'ip_address' => $ip_address,
        ]);

        $user_data = $user->userData()->create([
            'citizenship' => $request->citizenship,
            'personal_code' => $this->getUserPersonalCode(),
            'iban' => $this->getUserIBAN(),
        ]);

        $balance = $user->balance()->create([
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'Вы зарегистрированы');

        Auth::login($user);

        return redirect()->route('finances');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('login', $request->login)->first();

        if (isset($user) && $user->is_banned) {
            return redirect()->back()->with('error', 'Аккаунт заблокирован');
        }

        if (Auth::attempt([
            'login' => $request->login,
            'password' => $request->password
        ])) {
            session()->flash('success', 'Вы вошли');

            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('finances');
            }
        }

        return redirect()->back()->with('error', 'Неверный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function passwordRequest()
    {
        return view('forgot-password');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? view('link-sent')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function userIdentify()
    {
        $user = User::find(Auth::user()->id);
        $user_name = $user->last_name . ' ' . $user->first_name . ' ' . $user->patronymic;
        $user_passport = $user->userData->passport_num;

        return view('identify', compact('user_name', 'user_passport'));
    }

    public function userIdentifyStore(Request $request)
    {
        $request->validate([
            'citizenship' => 'required',
            'passport_num' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic' => 'required',
            'birth_date' => 'required',
            'issue_date' => 'required',
            'user_address' => 'required',
            'inn' => 'required',
            'passport_photo_first' => 'image',
            'passport_photo_address' => 'image',
        ]);

        $user_data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'patronymic' => $request->patronymic,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'need_confirmation' => 0,
            'confirmation' => 1,
        ];

        $user_data_rel = [
            'citizenship' => $request->citizenship,
            'passport_num' => $request->passport_num,
            'passport_issuer' => $request->passport_issuer,
            'issuer_code' => $request->issuer_code,
            'issue_date' => $request->issue_date,
            'user_address' => $request->user_address,
            'inn' => $request->inn,
            'code_kaz' => $request->code_kaz,
        ];

        if ($request->hasFile('passport_photo_first')) {
            $folder = date('Y-m-d');
            $user_data_rel['passport_photo_first'] = $request->file('passport_photo_first')->store("images/{$folder}");
        }
        if ($request->hasFile('passport_photo_address')) {
            $folder = date('Y-m-d');
            $user_data_rel['passport_photo_address'] = $request->file('passport_photo_address')->store("images/{$folder}");
        }

        // will retrieve via updated_at field of related UserData model
//        $data['identifying_at'] = now();


        $user = User::find(Auth::user()->id);
        $user->update($user_data);
        $user->userData()->update($user_data_rel);


        // need to implement notices
//        $notice_blank = Blank::where('slug', 'data_sent')->first();
//        $notice = [
//            'title' => $notice_blank->title,
//            'text' => $notice_blank->text,
//            'user_id' => Auth::user()->id
//        ];
//        Notice::create($notice);

        return redirect()->route('user.identify')->with('success', 'Данные отправлены на проверку');
    }

    public function authInfo()
    {
        $user = User::find(Auth::user()->id);
        $control_sum = ($user->balance->control_sum_lt) ?: 0;

        return view('auth-info', compact('control_sum'));
    }


    protected function getUserPersonalCode()
    {
        $personalCode = $this->getNumbers();

        while (UserData::where('personal_code', $personalCode)->first()) {
            $personalCode = $this->getNumbers();
        }

        return $personalCode;
    }

    protected function getUserIBAN()
    {
        $iban = $this->getNumbers();

        while (UserData::where('iban', $iban)->first()) {
            $iban = $this->getNumbers();
        }

        return $iban;
    }

    protected function getNumbers()
    {
        $numbers = '';

        for ($i = 0; $i <= 3; $i++) {
            $numbers .= rand(0, 9);
        }

        return $numbers;
    }
}
