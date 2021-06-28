@extends('layouts.logged')

@section('page-title'){{ __('main.operations.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="finance-block ">
        <p class="finance-block__title">{{ __('main.finances.title') }}</p>

        <div class="state-finance">
            <p class="state-finance__title">{{ __('main.finances.accounts') }}</p>
            <div class="state-mob">
                <div class="state-item">
                    <p class="state-item__val">₽</p>
                    <p class="state-item__text">{{ $balance_rur }}</p>
                </div>

                <div class="state-item">
                    <p class="state-item__val">$</p>
                    <p class="state-item__text">{{ $balance_usd }}</p>
                </div>

                <div class="state-item">
                    <p class="state-item__val">€</p>
                    <p class="state-item__text">{{ $balance_eur }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="operations-block">
        <p class="operations-block__title"><img src="{{ asset('img/str-two/block-right/title-img-1.svg') }}"
                                                alt="">{{ __('main.operations.title') }}</p>

        @if(count($operations))
            <div class="operations-cont">
                <div class="operations-item">
                    @foreach($operations as $operation)
                        <div class="item-cont">
                            <div class="left-item">
                                <div class="block-active">
                                    <img src="{{ asset('img/str-two/block-right/vallet.svg') }}" alt="">
                                </div>
                                <div class="left-cont">
                                    <div class="left-top">
                                        <p class="left-cont__title">{{ $operation->__('title') }}</p>
                                        <p class="left-cont__time">{{ $operation->__('created') }}</p>
                                    </div>
                                    <p class="left-cont__name">{!! $operation->__('description') !!}</p>
                                </div>
                            </div>

                            <div class="right-item">
                                <p class="right-item__price">{{ $operation->sum }} {{ $operation->currency }}</p>
                                <!-- <p class="right-item__update"><img src="img/str-two/block-right/icon-update.svg" alt=""></p> -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="operations-block__noOperations">{{ __('main.operations.no_operations') }}</p>
        @endif
        <a href="#" class="operations-block__link">{{ __('main.operations.all') }}</a>
    </div>

    <div class="transfers-block">
        <p class="transfers-block__title"><img src="{{ asset('img/str-two/block-right/transfer-img.svg') }}"
                                               alt="">{{ __('main.transfers.title') }}</p>

        <div class="transfers-item">
            <p class="transfers-item__title">{{ __('main.transfers.transfers_title') }}</p>
            <a href="#" class="transfers-item__link" id="linkPerevod2">
                <img src="{{ asset('img/str-two/block-right/icon/icon1.svg') }}" alt="">
                <span>{{ __('main.transfers.to_customer_by_card') }}</span></a>
            <a href="#" class="transfers-item__link link-hover" id="linkPerevod">
                <img src="{{ asset('img/str-two/block-right/icon/icon2.svg') }}" alt="">
                <span>{{ __('main.transfers.to_other_bank_by_card') }}</span></a>
            <a href="#" class="transfers-item__link link-hover" id="linkPerevod3">
                <img src="{{ asset('img/str-two/block-right/icon/icon2.svg') }}" alt="">
                <span>{{ __('main.transfers.to_other_bank') }}</span></a>
        </div>

        <div class="transfers-item">
            <p class="transfers-item__title">{{ __('main.transfers.e_wallet_title') }}</p>
            <a href="#" class="transfers-item__link transfersLink1">
                <img src="{{ asset('img/str-two/block-right/icon/icon3.svg') }}" alt="">Qiwi</a>
            <a href="#" class="transfers-item__link transfersLink">
                <img src="{{ asset('img/str-two/block-right/icon/icon4.png') }}" alt="">{{ __('main.transfers.u') }}</a>
            <a href="#" class="transfers-item__link transfersLink2">
                <img src="{{ asset('img/str-two/block-right/icon/icon5.svg') }}" alt="">PayPal</a>
            <a href="#" class="transfers-item__link transfersLink">
                <img src="{{ asset('img/str-two/block-right/icon/icon6.svg') }}" alt="">OSON</a>
            <a href="#" class="transfers-item__link transfersLink3">
                <img src="{{ asset('img/str-two/block-right/icon/icon7.svg') }}" alt="">{{ __('main.transfers.mobile') }}</a>
        </div>
    </div>

    <div class="block-perevod" id="perevod1">
        <p class="block-perevod__title">{{ __('main.transfers.to_bank') }}</p>

        <form action="{{ route('operation.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title_{{ session('locale') }}" value="{{ __('main.transfers.to_bank') }}">
            <input type="hidden" name="type" value="transfer_to_bank">

            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.bik') }}</p>
                <input type="text" class="input-num" name="bik" placeholder="000000000">
            </div>

            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.account') }}</p>
                <input type="text" class="input-num" name="number" placeholder="000000000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" class="input-num" name="sum" placeholder="{{ __('main.enter_sum') }}">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
    </div>

    <div class="block-perevod" id="perevod2">
        <p class="block-perevod__title">{{ __('main.transfers.to_customer') }}</p>

        <form action="{{ route('operation.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title_{{ session('locale') }}" value="{{ __('main.transfers.to_customer') }}">
            <input type="hidden" name="type" value="transfer_to_customer">

            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.card_number') }}</p>
                <input type="text" class="input-num" name="number" placeholder="0000 0000 0000 0000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" class="input-num" name="sum" placeholder="{{ __('main.enter_sum') }}">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
    </div>

    <div class="block-perevod" id="perevod6">
        <p class="block-perevod__title">{{ __('main.transfers.qiwi') }}</p>

        <form action="{{ route('operation.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title_{{ session('locale') }}" value="{{ __('main.transfers.qiwi') }}">
            <input type="hidden" name="type" value="transfer_qiwi">

            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.phone_number') }}</p>
                <input type="tel" class="input-num-phone" name="phone" placeholder="+0 000 000 000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" class="input-num" name="sum" placeholder="{{ __('main.enter_sum') }}">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
    </div>

    <div class="block-perevod" id="perevod7">
        <p class="block-perevod__title">{{ __('main.transfers.paypal') }}</p>

        <form action="{{ route('operation.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title_{{ session('locale') }}" value="{{ __('main.transfers.paypal') }}">
            <input type="hidden" name="type" value="transfer_paypal">

            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.phone_number') }}</p>
                <input type="tel" class="input-num-phone" name="phone" placeholder="+0 000 000 000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" class="input-num" name="sum" placeholder="{{ __('main.enter_sum') }}">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
    </div>

    <div class="block-perevod" id="perevod8">
        <p class="block-perevod__title">{{ __('main.transfers.mobile_phone') }}</p>

        <form action="{{ route('operation.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title_{{ session('locale') }}" value="{{ __('main.transfers.mobile_phone') }}">
            <input type="hidden" name="type" value="mobile_phone">

            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.phone_number') }}</p>
                <input type="tel" class="input-num-phone" name="phone" placeholder="+0 000 000 000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" class="input-num" name="sum" placeholder="{{ __('main.enter_sum') }}">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
    </div>

    <div class="block-perevod" id="perevod3">
        <p class="block-perevod__title">{{ __('main.transfers.e_wallet') }}</p>

        <form action="#" class="perevod-form">
            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.wallet_number') }}</p>
                <input type="text" name="" placeholder="+7 999 999-99-99">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" name="" placeholder="{{ __('main.enter_sum') }}">
                <select name="" id="">
                    <option value="">₽</option>
                    <option value="">$</option>
                    <option value="">€</option>
                </select>
            </div>

            <div class="block-link">
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
    </div>

    <div class="block-perevod" id="perevod4">
        <p class="block-perevod__good">{{ __('main.transfers.completed') }}</p>
    </div>

    <div class="block-perevod" id="perevod5">
        <p class="block-perevod__title">{{ __('main.transfers.to_other_bank') }}</p>

        <form action="#" class="perevod-form">
            <div class="input-block">
                <p class="input-block__text">{{ __('main.transfers.card_number') }}</p>
                <input type="text" name="" placeholder="0000 0000 0000 0000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">{{ __('main.sum') }}</p>
                <input type="text" name="" placeholder="{{ __('main.enter_sum') }}">
                <select name="" id="">
                    <option value="">₽</option>
                    <option value="">$</option>
                    <option value="">€</option>
                </select>
            </div>

            <div class="block-link">
                <a href="#" class="block-link__prev">{{ __('main.back') }}</a>
                <button class="item-serv">{{ __('main.send') }}</button>
            </div>
        </form>

        @include('incs.operation-notification')
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