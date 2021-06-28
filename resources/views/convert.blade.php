@extends('layouts.logged')

@section('page-title'){{ __('convert.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="convert-block">
        <p class="convert-block__title">{{ __('convert.title') }}</p>
        <form action="{{ route('convert.store') }}" method="post" class="form-convert">
            @csrf
            <div class="input-block">
                <p class="input-block__text">{{ __('convert.sub') }}</p>
                <input type="text" id="first_currency_sum" name="first_currency_sum"
                       placeholder="{{ __('convert.enter_sum') }}">
                <select name="first_currency" id="first_currency">
                    <option value="RUB" selected>₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="input-block">
                <p class="input-block__text">{{ __('convert.add') }}</p>
                <input type="text" id="second_currency_sum" name="second_currency_sum"
                       placeholder="{{ __('convert.enter_sum') }}">
                <select name="second_currency" id="second_currency">
                    <option value="RUB">₽</option>
                    <option value="USD" selected>$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <button class="item-serv">{{ __('convert.convert') }}</button>

            <div id="error" class="input-block"></div>
        </form>
    </div>

    <div class="div-text">
        <p class="div-text__text">
            @if($user->withdrawable)
                {{ __('convert.admin_message') }}
            @else
                {{ __('convert.withdraw_forbidden_message') }}
            @endif
        </p>
        <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
    </div>

    @include('incs.no-active-block')

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