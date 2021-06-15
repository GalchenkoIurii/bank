@extends('layouts.logged')

@section('page-title')Мой профиль @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="finance-block ">
        <p class="finance-block__title">МОЙ ПРОФИЛЬ</p>

        <div class="identification-block">
            <div class="block-img"><img src="{{ asset('img/str-two/block-right/img-1.png') }}" alt=""></div>

            <div class="block-text">
                <p class="block-text__title">Подтверждение личных данных держателя счета</p>
                <p class="block-text__text">Что бы получить полный спектр услуг и возможность вывода ваших средств в
                    другие банки, клиентам нашего онлайн банка необходимо пройти процедуру подтверждения личных данных
                    держателя счета.</p>
                <a href="{{ route('user.identify') }}" class="block-text__link">Пройти подтверждение</a>
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