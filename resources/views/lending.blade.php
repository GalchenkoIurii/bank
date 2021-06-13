@extends('layouts.logged')

@section('page-title')Услуги кредитования @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@include('incs.fix-block')

@section('content')
    @include('incs.admin-message')

    <div class="kredit-block">
        <p class="kredit-block__title">УСЛУГИ КРЕДИТОВАНИЯ</p>

        @if($has_reviewing_credits)
            <div class="kredit-item">
                <p class="kredit-item__title">Ваша заявка на кредит находится на рассмотрении, повторная
                    подача заявки будет доступна после рассмотрения текущей заявки</p>
            </div>
        @elseif(auth()->check() && auth()->user()->confirmed)

        @foreach($credits as $credit)
            <div class="kredit-item">
                <p class="kredit-item__title">{{ $credit->category_lt }}</p>
                {!! $credit->description_lt !!}
                <a href="{{ route('lending.' . $credit->category_slug) }}" class="kredit-item__link">Оставить заявку</a>
            </div>
        @endforeach

        @else
            <div class="kredit-item">
                <p class="kredit-item__title">Для подачи заявки на кредит Вам необходимо пройти первый шаг идентификации</p>
                <a href="{{ route('user.identify') }}" class="kredit-item__link">Идентификация</a>
            </div>
        @endif

        <div class="kredit-item">
            <p class="kredit-item__title"><span>!</span>Информация</p>
            <p class="kredit-item__text">Подробная информация о рамках получения кредита и его погашения.</p>
            <a href="{{ route('lending.info') }}" class="kredit-item__link">Узнать больше</a>
        </div>
    </div>


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