@extends('layouts.main')

@section('page-title'){{ __('main.password.recovery_title') }} @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="{{ route('password.update') }}" method="POST" class="form-reg login">
                    @csrf
                    <p class="form-reg__title">{{ __('main.password.change') }}</p>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif

                    @if(session()->has('error'))
                        <p class="error">{{ session('error') }}</p>
                    @endif

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="block-input">
                        <p class="block-input__text">Email</p>
                        <input type="email" name="email" id="userEmail" placeholder="email@mail.com" required>
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.password.new') }}</p>
                        <input type="password" name="password" id="userPassword"
                               placeholder="{{ __('main.login.password_text') }}" required>
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.password.repeat') }}</p>
                        <input type="password" name="password_confirmation" id="userPasswordTwo"
                               placeholder="{{ __('main.register.password_confirm_text') }}" required>
                    </div>

                    <div class="block-link">
                        <button id="regBtn">{{ __('main.password.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('incs.footer-register')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection