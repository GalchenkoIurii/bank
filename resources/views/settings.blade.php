@extends('layouts.logged')

@section('page-title'){{ __('settings.title') }} @endsection

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
        <p class="form-setting__title">{{ __('settings.title') }}</p>

        <p class="form-setting__text">{{ __('settings.subtitle') }}</p>

        <div class="block-input one">
            <p class="block-input__text">{{ __('settings.login') }}</p>
            <input type="text" name="login" id="login" placeholder="{{ __('settings.login') }}"
                   @if($user['login'])
                        value="{{ $user['login'] }}"
                   @endif
            >
        </div>

        <div class="block-input one">
            <p class="block-input__text">{{ __('settings.email') }}</p>
            <input type="email" name="email" id="email" placeholder="{{ __('settings.email') }}"
                   @if($user['email'])
                        value="{{ $user['email'] }}"
                   @endif
            >
        </div>

        <div class="block-input">
            <p class="block-input__text">{{ __('settings.phone') }}</p>
            <input type="tel" name="phone" id="phone" placeholder="{{ __('settings.phone') }}"
                   @if($user['phone'])
                        value="{{ $user['phone'] }}"
                   @endif
            >
        </div>

        <p class="form-setting__text two">{{ __('settings.password_title') }}</p>

        <div class="block-input one">
            <p class="block-input__text">{{ __('settings.password_title_old') }}</p>
            <input type="password" name="passwordOld" id="passwordOld"
                   placeholder="{{ __('settings.password_enter_old') }}">
        </div>

        <div class="block-input">
            <p class="block-input__text">{{ __('settings.password_title_new') }}</p>
            <input type="password" name="passwordNew" id="passwordNew"
                   placeholder="{{ __('settings.password_enter_new') }}">
        </div>

        <div class="block-btn">
            <button type="submit">{{ __('settings.save') }}</button>
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