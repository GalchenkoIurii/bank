@extends('layouts.main')

@section('page-title')Регистрация @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="{{ route('register.store') }}" method="post" class="form-reg">
                    @csrf
                    <p class="form-reg__title">РЕГИСТРАЦИЯ</p>

                    <div class="block-input">
                        <p class="block-input__text">Логин</p>
                        <input type="text" name="login" id="userLogin"
                               placeholder="Введите логин" value="{{ old('login') }}" required>
                        @error('login')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">Телефон</p>
                        <input type="tel" name="phone" id="userTel" placeholder="" value="{{ old('phone') }}"
                               ng-model="selectedCountryDialCode" ng-value="selectedCountry.dial_code" required>
                        @error('phone')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">Почта</p>
                        <input type="email" name="email" id="userEmail" placeholder="pochta@mail.ru" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">Ваше гражданство</p>
                        {{--<select name="citizenship" id="citizenship" ng-model="selectedCountry" ng-options="country.name for country in countriesWithPhoneCode">--}}
                        {{--<option value="">Select country</option>--}}
                        {{--</select>--}}
                        <select class="select_ul" name="citizenship" id="citizenship">
                            <option selected class="option" value="Россия">Россия</option>
                            <option class="option" value="Литва">Литва</option>
                            <option class="option" value="Казахстан">Казахстан</option>
                            <option class="option" value="Узбекистан">Узбекистан</option>
                            <option class="option" value="Беларусь">Беларусь</option>
                            <option class="option" value="Таджикистан">Таджикистан</option>
                            <option class="option" value="Украина">Украина</option>
                            <option class="option" value="Польша">Польша</option>
                            <option class="option" value="Чехия">Чехия</option>
                        </select>
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">Пароль</p>
                        <input type="password" name="password" id="userPassword" placeholder="Введите пароль" required>
                    </div>

                    <div class="block-input">
                        <p class="block-input__text">Подтверждение пароля</p>
                        <input type="password" name="password_confirmation" id="userPasswordTwo" placeholder="Введите пароль ещё раз" required>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block-check">
                        <input type="checkbox" id="" checked>
                        <label for=""><p class="police">При регистрации в онлайн банке вы соглашаетесь с <a href="{{ route('agreement') }}">Пользовательским соглашенем</a> и обязуетесь его соблюдать</p></label>
                    </div>

                    <div class="block-link">
                        <button type="submit" id="regBtn">Зарегистрироваться</button>
                        <a href="{{ route('login.create') }}" class="block-link__link">Уже есть аккаунт?</a>
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