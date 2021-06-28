@extends('layouts.logged')

@section('page-title'){{ __('investments.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="services-block">
        <p class="services-block__title">{{ __('investments.title') }}</p>
        {{--<form action="#" class="form-search">--}}
            {{--<input type="search" name="" placeholder="{{ __('investments.search') }}">--}}
        {{--</form>--}}

        <div class="serv-page">
            <div class="item-page">
                <p class="item-page__title">{{ __('investments.currency') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon5.svg') }}" alt="">
                        <span class="services-one__text">{{ __('investments.currency') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('investments.start') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('investments.shares') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon8.svg') }}" alt="">
                        <span class="services-one__text">{{ __('investments.shares') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('investments.start') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('investments.funds') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon6.svg') }}" alt="">
                        <span class="services-one__text">{{ __('investments.funds') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('investments.start') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('investments.futures') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon7.svg') }}" alt="">
                        <span class="services-one__text">{{ __('investments.futures') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('investments.start') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('investments.notes') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon3.svg') }}" alt="">
                        <span class="services-one__text">{{ __('investments.notes') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('investments.start') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('investments.help') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon6.svg') }}" alt="">
                        <span class="services-one__text">{{ __('investments.help') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('investments.start') }}</a>
            </div>
        </div>
    </div>

    @include('incs.no-active-block-2')

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