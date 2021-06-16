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
