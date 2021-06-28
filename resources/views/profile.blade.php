@extends('layouts.logged')

@section('page-title'){{ __('profile.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="finance-block ">
        <p class="finance-block__title">{{ __('profile.title') }}</p>

        <div class="identification-block">
            <div class="block-img"><img src="{{ asset('img/str-two/block-right/img-1.png') }}" alt=""></div>

            <div class="block-text">
                <p class="block-text__title">{{ __('profile.confirm.title') }}</p>
                <p class="block-text__text">{{ __('profile.confirm.text') }}</p>
                <a href="{{ route('user.identify') }}" class="block-text__link">{{ __('profile.confirm.btn') }}</a>
            </div>
        </div>

        <div class="identification-block">
            <div class="block-img"><img src="{{ asset('img/str-two/block-right/title-img-1.svg') }}" alt=""></div>

            <div class="block-text">
                <p class="block-text__title">{{ __('profile.identify.title') }}</p>

                @if($is_user_confirmed && $is_positive_balance)
                    <a href="{{ route('auth.info') }}" class="block-text__link">{{ __('profile.identify.btn') }}</a>
                @else
                    <p class="block-text__text">{{ __('profile.identify.text') }}</p>
                @endif
            </div>
        </div>
    </div>

    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/hammer.js') }}"></script>
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