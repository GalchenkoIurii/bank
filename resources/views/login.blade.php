@extends('layouts.main')

@section('page-title'){{ __('main.login.title') }} @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="{{ route('login') }}" method="post" class="form-reg login">
                    @csrf
                    <p class="form-reg__title">{{ __('main.login.subtitle') }}</p>

                    @if(session()->has('error'))
                        <p class="block-input__arror">{{ session('error') }}</p>
                    @endif

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.login.login_title') }}</p>
                        <input type="text" name="login" id="userLogin"
                               placeholder="{{ __('main.login.login_text') }}" required>
                    </div>

                    <div class="block-input last">
                        <p class="block-input__text">{{ __('main.login.password_title') }}</p>
                        <input type="password" name="password" id="userPassword"
                               placeholder="{{ __('main.login.password_text') }}" required>
                        <a href="{{ route('password.request') }}"
                           class="block-input__link">{{ __('main.login.forgot_password') }}</a>
                    </div>

                    <div class="block-link login">
                        <button type="submit" id="regBtn">{{ __('main.header.login') }}</button>
                        <a href="{{ route('register.create') }}"
                           class="block-link__link">{{ __('main.login.no_account') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('incs.footer-home')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection