@extends('layouts.logged')

@section('page-title'){{ __('services.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="services-block serv">
        <p class="services-block__title">{{ __('services.title') }}</p>
        {{--<form action="#" class="form-search">--}}
            {{--<input type="search" name="" placeholder="{{ __('services.search') }}">--}}
        {{--</form>--}}

        <div class="serv-page">
            <div class="item-page">
                <p class="item-page__title">{{ __('services.cinema') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon1.svg') }}" alt="">
                        <span class="services-one__text">{{ __('services.cinema') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link item-serv header-menu__no-active">{{ __('services.more') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('services.avia') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon2.svg') }}" alt="">
                        <span class="services-one__text">{{ __('services.avia') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link item-serv header-menu__no-active">{{ __('services.more') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('services.insurance') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon3.svg') }}" alt="">
                        <span class="services-one__text">{{ __('services.insurance') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link item-serv header-menu__no-active">{{ __('services.more') }}</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">{{ __('services.card_title') }}</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon4.svg') }}" alt="">
                        <span class="services-one__text">{{ __('services.card_text') }}</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">{{ __('services.card_btn') }}</a>
            </div>
        </div>
    </div>

    @include('incs.no-active-block')

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