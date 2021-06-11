@extends('layouts.main')

@section('page-title')Вход @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="{{ route('login') }}" method="post" class="form-reg login">
                    @csrf
                    <p class="form-reg__title">ВХОД В АККАУНТ</p>

                    @if(session()->has('error'))
                        <p class="block-input__arror">{{ session('error') }}</p>
                    @endif

                    <div class="block-input">
                        <p class="block-input__text">Логин</p>
                        <input type="text" name="login" id="userLogin" placeholder="Введите логин" required>
                    </div>

                    <div class="block-input last">
                        <p class="block-input__text">Пароль</p>
                        <input type="password" name="password" id="userPassword" placeholder="Введите пароль" required>
                        <a href="{{ route('password.request') }}" class="block-input__link">Забыли пароль?</a>
                    </div>

                    <div class="block-link login">
                        <button type="submit" id="regBtn">Войти</button>
                        <a href="{{ route('register.create') }}" class="block-link__link">Нет аккаунта?</a>
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