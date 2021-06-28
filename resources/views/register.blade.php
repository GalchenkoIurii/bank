@extends('layouts.main')

@section('page-title'){{ __('main.register.title') }} @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="{{ route('register.store') }}" method="post" class="form-reg">
                    @csrf
                    <p class="form-reg__title">{{ __('main.register.title') }}</p>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.login.login_title') }}</p>
                        <input type="text" name="login" id="userLogin"
                               placeholder="{{ __('main.login.login_text') }}" value="{{ old('login') }}" required>
                        @error('login')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.register.phone') }}</p>
                        <input type="tel" name="phone" id="userTel" placeholder="" value="{{ old('phone') }}"
                               ng-model="selectedCountryDialCode" ng-value="selectedCountry.dial_code" required>
                        @error('phone')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.register.mail') }}</p>
                        <input type="email" name="email" id="userEmail" placeholder="mail@mail.com" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('identify.data.citizenship') }}</p>
                        {{--<select name="citizenship" id="citizenship" ng-model="selectedCountry" ng-options="country.name for country in countriesWithPhoneCode">--}}
                        {{--<option value="">Select country</option>--}}
                        {{--</select>--}}
                        <select class="select_ul" name="citizenship" id="citizenship">
                            <option selected class="option" value="{{ __('identify.data.rus') }}">{{ __('identify.data.rus') }}</option>
                            <option class="option" value="{{ __('identify.data.lit') }}">{{ __('identify.data.lit') }}</option>
                            <option class="option" value="{{ __('identify.data.kaz') }}">{{ __('identify.data.kaz') }}</option>
                            <option class="option" value="{{ __('identify.data.uz') }}">{{ __('identify.data.uz') }}</option>
                            <option class="option" value="{{ __('identify.data.bel') }}">{{ __('identify.data.bel') }}</option>
                            <option class="option" value="{{ __('identify.data.tag') }}">{{ __('identify.data.tag') }}</option>
                            <option class="option" value="{{ __('identify.data.ukr') }}">{{ __('identify.data.ukr') }}</option>
                            <option class="option" value="{{ __('identify.data.kir') }}">{{ __('identify.data.kir') }}</option>
                        </select>
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.login.password_title') }}</p>
                        <input type="password" name="password" id="userPassword"
                               placeholder="{{ __('main.login.password_text') }}" required>
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">{{ __('main.register.password_confirm_title') }}</p>
                        <input type="password" name="password_confirmation" id="userPasswordTwo"
                               placeholder="{{ __('main.register.password_confirm_text') }}" required>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-check">
                        <input type="checkbox" id="" checked>
                        <label for=""><p class="police">{{ __('main.register.agreement_first') }}
                                <a href="{{ route('agreement') }}">{{ __('main.register.agreement_second') }}</a>
                                {{ __('main.register.agreement_third') }}</p></label>
                    </div>

                    <div class="block-link">
                        <button type="submit" id="regBtn">{{ __('main.register.register') }}</button>
                        <a href="{{ route('login.create') }}"
                           class="block-link__link">{{ __('main.register.have_account') }}</a>
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
    <script data-require="angular.js@1.4.8" data-semver="1.4.8" src="https://code.angularjs.org/1.4.8/angular.js"></script>
    <script src="{{ asset('js/select.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection