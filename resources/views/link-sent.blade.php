@extends('layouts.main')

@section('page-title')Письмо отправлено @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="#" class="form-reg login pas">
                    <p class="form-reg__title">ПИСЬМО ДЛЯ ВОССТАНОВЛЕНИЯ ОТПРАВЛЕНО</p>

                    <p class="form-reg__text">Проверьте вашу почту, откройте письмо и перейдите по ссылке в письме для
                        восстановления пароля. Не пришло письмо? Возможно вы не верно ввели данные. Попробуйте ещё раз.</p>
                    <a href="{{ route('password.request') }}" class="form-reg__link">Отправить сообщение заново</a>
                    <a href="{{ route('home') }}" class="form-reg__link two">На главную</a>
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