@extends('layouts.logged')

@section('page-title')Услуги кредитования | {{ $credit->category_lt }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <section class="section-calc" id="section-calc">
        <div class="container">
            <div class="calc-wrap">
                <div class="section-calc-input">

                    <div class="calc-block">
                        <div class="calc-headline">Желаемая сумма кредита</div>

                        <div class="field-box">
                            <div class="field-wrap">
                                <input class="input" id="sum-input" type="text" value="{{ $credit->min_sum }}"
                                       min="{{ $credit->min_sum }}" max="{{ $credit->max_sum }}">
                            </div>

                            <div class="slider-box slider-wrap">
                                <input type="range" class="slider-input" id="sum-slider" value="{{ $credit->min_sum }}"
                                       min="{{ $credit->min_sum }}" max="{{ $credit->max_sum }}">
                            </div>

                            <div class=""><span class="rouble">руб.</span></div>
                        </div>
                    </div>

                    <div class="calc-block new">

                        <div class="field-box ">
                            <div class="calc-headline">Срок кредита</div>
                            <div class="field-wrap">
                                <input class="input" id="term-input" type="number" value="{{ $credit->min_term }}"
                                       min="{{ $credit->min_term }}" max="{{ $credit->max_term }}">
                            </div>

                            <div class="slider-box slider-wrap">
                                <input type="range" class="slider-input" id="term-slider" value="{{ $credit->min_term }}"
                                       min="{{ $credit->min_term }}" max="{{ $credit->max_term }}">
                            </div>

                            <div class="month">мес.</div>
                        </div>

                        <div class="">
                            <div class="calc-headline one">Ежемесячный платеж</div>
                            <div class="calc-value" id="payment-month">0 <span class="rouble">руб</span></div>
                        </div>
                    </div>

                </div>
            </div>

            <form action="{{ route('lending.store') }}" method="post" class="form-cont">
                @csrf

                <p class="cont-title">Контактная информация</p>

                <input type="hidden" name="credit_setting_id" id="creditCategory" value="{{ $credit->id }}">
                <input type="hidden" name="credit_sum" id="creditSum">
                <input type="hidden" name="credit_term" id="creditTerm">
                <input type="hidden" name="percent" id="creditPercent">
                <input type="hidden" name="monthly_payment" id="monthlyPayment">
                <input type="hidden" name="user_id" id=""
                       @if(auth()->check())
                            value="{{ auth()->user()->id }}"
                       @endif
                >
                <div class="block-input">
                    <input type="text" name="full_name" placeholder="Фамилия, имя и отчество" class="cont-input"
                           @if(auth()->check())
                                value="{{ auth()->user()->last_name . ' ' . auth()->user()->first_name . ' ' . auth()->user()->patronymic }}"
                           @endif
                    >
                    <p class="text-arror">Укажите фамилию, имя и отчество через пробел</p>
                </div>

                <div class="block-input tel">
                    <input type="tel" name="phone" placeholder="Мобильный телефон*" class="cont-tel"
                           @if(auth()->check())
                                value="{{ auth()->user()->phone }}"
                           @endif
                    >
                    <p class="text-arror">Необходимо указать номер телефона</p>
                </div>

                <div class="block-input email">
                    <input type="email" name="email" placeholder="Электронная почта" class="cont-email"
                           @if(auth()->check())
                                value="{{ auth()->user()->email }}"
                           @endif
                    >
                </div>

                <div class="section-header">
                    <h2 class="">Личный документ</h2>
                </div>


                <select name="" id="" class="select">
                    <option value="">паспорт</option>
                </select>

                <div class="block-btn">
                    <label class="wrapper-login01">
                        <input class="checkbox-login01" name="agreement" checked type="checkbox">
                        <span class="style-login01"></span>
                        <span class="text-login01">Я принимаю условия передачи информации</span>
                    </label>
                    <button>Отправить</button>
                </div>
            </form>
        </div>
    </section>

    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        });

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
        });

        $(function($){
            $('.cont-tel').mask("+7(999) 999-9999");
        });
    </script>
@endsection