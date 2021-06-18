@extends('layouts.logged')

@section('page-title')Инвестиции @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="services-block">
        <p class="services-block__title">ИНВЕСТИЦИИ</p>
        <form action="#" class="form-search">
            <input type="search" name="" placeholder="Поиск">
        </form>

        <div class="serv-page">
            <div class="item-page">
                <p class="item-page__title">Валюта</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon5.svg') }}" alt="">
                        <span class="services-one__text">Валюта</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">Начать инвестировать</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">Акции</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon8.svg') }}" alt="">
                        <span class="services-one__text">Акции</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">Начать инвестировать</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">Фонды</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon6.svg') }}" alt="">
                        <span class="services-one__text">Фонды</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">Начать инвестировать</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">Фьючерсы</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon7.svg') }}" alt="">
                        <span class="services-one__text">Фьючерсы</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">Начать инвестировать</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">Структурные ноты</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon3.svg') }}" alt="">
                        <span class="services-one__text">Структурные ноты</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">Начать инвестировать</a>
            </div>

            <div class="item-page">
                <p class="item-page__title">Помощь брокера</p>
                <div class="page-services">
                    <div class="services-one">
                        <img src="{{ asset('img/new-icon/icon6.svg') }}" alt="">
                        <span class="services-one__text">Помощь брокера</span>
                    </div>
                </div>

                <a href="#" class="item-page__link link-new">Начать инвестировать</a>
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