@extends('layouts.logged')

@section('page-title')Настройки анкеты @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <form action="{{ route('user.settings.store') }}" method="post" class="form-setting">
        @csrf
        <p class="form-setting__title">НАСТРОЙКИ АНКЕТЫ</p>

        <p class="form-setting__text">Основные настройки:</p>

        <div class="block-input one">
            <p class="block-input__text">Логин</p>
            <input type="text" name="login" id="login" placeholder="Логин"
                   @if($user['login'])
                        value="{{ $user['login'] }}"
                   @endif
            >
        </div>

        <div class="block-input one">
            <p class="block-input__text">Почта</p>
            <input type="email" name="email" id="email" placeholder="Почта"
                   @if($user['email'])
                        value="{{ $user['email'] }}"
                   @endif
            >
        </div>

        <div class="block-input">
            <p class="block-input__text">Телефон</p>
            <input type="tel" name="phone" id="phone" placeholder="Телефон"
                   @if($user['phone'])
                        value="{{ $user['phone'] }}"
                   @endif
            >
        </div>

        <p class="form-setting__text two">Смена пароля:</p>

        <div class="block-input one">
            <p class="block-input__text">Старый пароль</p>
            <input type="password" name="passwordOld" id="passwordOld" placeholder="Введите свой старый пароль">
        </div>

        <div class="block-input">
            <p class="block-input__text">Новый пароль</p>
            <input type="password" name="passwordNew" id="passwordNew" placeholder="Пароль, на который вы хотите поменять">
        </div>

        <div class="block-btn">
            <button type="submit">Сохранить изменения</button>
            @if(session()->has('success'))
                <p class="block-btn__text">{{ session('success') }}</p>
            @endif
        </div>
    </form>

    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
        })
    </script>
@endsection