@extends('layouts.logged')

@section('page-title'){{ __('lending.title') }} | {{ $credit->__('category') }} @endsection

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
                        <div class="calc-headline">{{ __('lending.loan_sum') }}</div>

                        <div class="field-box">
                            <div class="field-wrap">
                                <input class="input" id="sum-input" type="text" value="{{ $credit->min_sum }}"
                                       min="{{ $credit->min_sum }}" max="{{ $credit->max_sum }}">
                            </div>

                            <div class="slider-box slider-wrap">
                                <input type="range" class="slider-input" id="sum-slider" value="{{ $credit->min_sum }}"
                                       min="{{ $credit->min_sum }}" max="{{ $credit->max_sum }}">
                            </div>

                            <div class=""><span class="rouble">{{ __('lending.currency') }}.</span></div>
                        </div>
                    </div>

                    <div class="calc-block new">

                        <div class="field-box ">
                            <div class="calc-headline">{{ __('lending.term_title') }}</div>
                            <div class="field-wrap">
                                <input class="input" id="term-input" type="number" value="{{ $credit->min_term }}"
                                       min="{{ $credit->min_term }}" max="{{ $credit->max_term }}">
                            </div>

                            <div class="slider-box slider-wrap">
                                <input type="range" class="slider-input" id="term-slider" value="{{ $credit->min_term }}"
                                       min="{{ $credit->min_term }}" max="{{ $credit->max_term }}">
                            </div>

                            <div class="month">{{ __('lending.term') }}.</div>
                        </div>

                        <div class="">
                            <div class="calc-headline one">{{ __('lending.payment') }}</div>
                            <div class="calc-value" id="payment-month">0 <span class="rouble">{{ __('lending.currency') }}</span></div>
                        </div>
                    </div>

                </div>
            </div>

            <form action="{{ route('lending.store') }}" method="post" class="form-cont">
                @csrf

                <p class="cont-title">{{ __('lending.contact_info') }}</p>

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
                    <input type="text" name="full_name" placeholder="{{ __('lending.full_name') }}"
                           class="cont-input"
                           @if(auth()->check())
                                value="{{ auth()->user()->last_name . ' ' . auth()->user()->first_name . ' ' . auth()->user()->patronymic }}"
                           @endif
                    >
                    <p class="text-arror">{{ __('lending.full_name_error') }}</p>
                </div>

                <div class="block-input tel">
                    <input type="tel" name="phone" placeholder="{{ __('lending.phone') }}" class="cont-tel"
                           @if(auth()->check())
                                value="{{ auth()->user()->phone }}"
                           @endif
                    >
                    <p class="text-arror">{{ __('lending.phone_error') }}</p>
                </div>

                <div class="block-input email">
                    <input type="email" name="email" placeholder="{{ __('lending.email') }}" class="cont-email"
                           @if(auth()->check())
                                value="{{ auth()->user()->email }}"
                           @endif
                    >
                </div>

                <div class="section-header">
                    <h2 class="">{{ __('lending.document') }}</h2>
                </div>


                <select name="" id="" class="select">
                    <option value="">{{ __('lending.pass') }}</option>
                </select>

                <div class="block-btn">
                    <label class="wrapper-login01">
                        <input class="checkbox-login01" name="agreement" checked type="checkbox">
                        <span class="style-login01"></span>
                        <span class="text-login01">{{ __('lending.agreement') }}</span>
                    </label>
                    <button>{{ __('main.send') }}</button>
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