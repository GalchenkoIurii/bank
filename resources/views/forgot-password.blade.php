@extends('layouts.main')

@section('page-title')Восстановление пароля @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')

    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="{{ route('password.email') }}" method="POST" class="form-reg login">
                    @csrf
                    <p class="form-reg__title">ВОССТАНОВЛЕНИЕ ПАРОЛЯ</p>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif

                    @if(session()->has('error'))
                        <p class="error">{{ session('error') }}</p>
                    @endif

                    @if(session()->has('email'))
                        <p class="error">{{ session('email') }}</p>
                    @endif

                    <div class="block-input">
                        <p class="block-input__text">Email</p>
                        <input type="email" name="email" id="userEmail" placeholder="Введите вашь Email" required>
                    </div>

                    <div class="block-link password">
                        <a href="{{ route('login') }}" class="block-link__link">Назад</a>
                        <button id="regBtn">Далее</button>
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