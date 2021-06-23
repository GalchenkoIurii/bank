@extends('layouts.main')

@section('page-title')Чек @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <div class="container"></div>

    <div class="chek-block">
        <div class="chek-container">
            <div class="block-img"><img src="{{ asset('img/logo.png') }}" alt=""></div>
            <div class="block-info">
                <div class="block-text">
                    <p class="block-text__title">Название операции</p>
                    <p class="block-text__text">{{ $check_info->title_lt }}</p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">Сумма</p>
                    <p class="block-text__text">{{ $check_info->sum }}</p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">Дата и время</p>
                    <p class="block-text__text"><span class="date">{{ $check_info->created_at }}</span></p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">№ транзакции</p>
                    <p class="block-text__text">{{ $check_info->id }}</p>
                </div>
            </div>

            <div class="page-info">
                <p class="page-info__title">По вопросам заказа обращайтесь в банк {{ $site_name->value_lt }}</p>

                <div class="block-text">
                    <p class="block-text__title">Адрес</p>
                    <p class="block-text__text">{{ $address->value_lt }}</p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">Эл. почта</p>
                    <a href="mailto:{{ $email->value_lt }}" class="block-text__link">{{ $email->value_lt }}</a>
                </div>

                <div class="block-text">
                    <p class="block-text__title">Телефон</p>
                    <a href="tel:{{ $tel->value_lt }}" class="block-text__text">{{ $tel->value_lt }}</a>
                </div>
            </div>

            <p class="text-thank">Спасибо, что воспользовались нашими услугами.</p>
        </div>

    </div>
@endsection

@section('footer')
    @include('incs.footer-home')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.spincrement.min.js') }}"></script>
@endsection