@extends('layouts.main')

@section('page-title'){{ __('main.password.link_sent_title') }} @endsection

@section('header')
    @include('incs.header-register')
@endsection

@section('content')
    <div class="reg-block">
        <div class="container">
            <div class="reg-cont">
                <form action="#" class="form-reg login pas">
                    <p class="form-reg__title">{{ __('main.password.link_sent_subtitle') }}</p>

                    <p class="form-reg__text">{{ __('main.password.link_sent_text') }}</p>
                    <a href="{{ route('password.request') }}"
                       class="form-reg__link">{{ __('main.password.link_resend') }}</a>
                    <a href="{{ route('home') }}" class="form-reg__link two">{{ __('main.password.link_home') }}</a>
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