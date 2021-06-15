@extends('layouts.logged')

@section('page-title')Мои операции @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="finance-block ">
        <p class="finance-block__title">МОИ ФИНАНСЫ</p>

        <div class="state-finance">
            <p class="state-finance__title">Состояние счетов</p>
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
        <p class="operations-block__title"><img src="{{ asset('img/str-two/block-right/title-img-1.svg') }}" alt="">Мои операции</p>

        @if(isset($operations))
            <div class="operations-cont">
                <div class="operations-item">
                    @foreach($operations as $operation)
                        <div class="item-cont">
                            <div class="left-item">
                                <div class="block-active"><img src="{{ asset('img/str-two/block-right/vallet.svg') }}" alt=""></div>
                                <div class="left-cont">
                                    <div class="left-top">
                                        <p class="left-cont__title">{{ $operation->title }}</p>
                                        <p class="left-cont__time">{{ $operation->created_at }}</p>
                                    </div>
                                    <p class="left-cont__name">{!! $operation->description !!}</p>
                                </div>
                            </div>

                            <div class="right-item">
                                <p class="right-item__price">{{ $operation->sum }}</p>
                                <!-- <p class="right-item__update"><img src="img/str-two/block-right/icon-update.svg" alt=""></p> -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="operations-block__noOperations">Ни одной операции не проведено</p>
        @endif
        <a href="#" class="operations-block__link">Все транзакции</a>
    </div>

    <div class="identification-block">
        <div class="block-img"><img src="{{ asset('img/str-two/block-right/img-1.png') }}" alt=""></div>

        <div class="block-text">
            <p class="block-text__title">Идентификация личного кабинета онлайн</p>
            <p class="block-text__text">Что бы получить полный спектр услуг и возможность вывода ваших средств в другие банки, клиентам нашего онлайн банка необходимо пройти процедуру идентификации личного кабинета.</p>
            <a href="{{ route('user.identify') }}" class="block-text__link">Пройти идентификацию</a>
        </div>
    </div>

    <div class="transfers-block">
        <p class="transfers-block__title"><img src="{{ asset('img/str-two/block-right/transfer-img.svg') }}" alt="">Переводы и пополнения</p>

        <div class="transfers-item">
            <p class="transfers-item__title">Переводы</p>
            <a href="#" class="transfers-item__link" id="linkPerevod2"><img src="img/str-two/block-right/icon/icon1.svg" alt=""><span>По номеру карты</span></a>
            <a href="#" class="transfers-item__link link-hover" id="linkPerevod"><img src="img/str-two/block-right/icon/icon2.svg" alt=""><span>В другой банк по номеру карты</span></a>
            <a href="#" class="transfers-item__link link-hover" id="linkPerevod3"><img src="img/str-two/block-right/icon/icon2.svg" alt=""><span>По реквизитам счета в любой банк</span></a>
        </div>

        <div class="transfers-item">
            <p class="transfers-item__title">Электронные кошельки и переводы</p>
            <a href="#" class="transfers-item__link transfersLink1"><img src="img/str-two/block-right/icon/icon3.svg" alt="">Qiwi</a>
            <a href="#" class="transfers-item__link transfersLink"><img src="img/str-two/block-right/icon/icon4.svg" alt="">Yandex.Money</a>
            <a href="#" class="transfers-item__link transfersLink2"><img src="img/str-two/block-right/icon/icon5.svg" alt="">PayPal</a>
            <a href="#" class="transfers-item__link transfersLink"><img src="img/str-two/block-right/icon/icon6.svg" alt="">OSON</a>
            <a href="#" class="transfers-item__link transfersLink3"><img src="img/str-two/block-right/icon/icon7.svg" alt="">Пополнение мобильного</a>
        </div>
    </div>

    <div class="block-noactive">
        <div class="noactive-header">
            <a href="#" class="noactive-header__prev"><img src="img/prev.svg" alt=""></a>
            <a href="{{ route('home') }}" class="noactive-header__title">AVRORA CAPITAL BANK</a>
            <a href="{{ route('home') }}" class="noactive-header__home"><img src="img/home.svg" alt=""></a>
        </div>
        <div class="noactive-cont">
            <p class="noactive-cont__title">Услуга недоступна.</p>
            <p class="noactive-cont__text">Для возможности инвестирования, Вам, необходимо иметь гражданство Евросоюза. Для получение подробной информации, обратитесь к онлайн админстратору банка.</p>
            <a href="#" class="noactive-cont__link">Назад</a>
        </div>
    </div>

    <div class="block-perevod" id="perevod1">
        <p class="block-perevod__title">ПЕРЕВОД В ДРУГОЙ БАНК ПО РЕКВИЗИТАМ</p>

        <form action="{{ route('transaction.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title" value="Перевод в другой банк по реквизитам">
            <input type="hidden" name="type" value="transfer_to_bank">

            <div class="input-block">
                <p class="input-block__text">БИК банка получателя</p>
                <input type="text" class="input-num" name="bik" placeholder="000000000">
            </div>

            <div class="input-block">
                <p class="input-block__text">Номер счета получателя</p>
                <input type="text" class="input-num" name="number" placeholder="000000000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" class="input-num" name="sum" placeholder="Введите сумму">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
    </div>

    <div class="block-perevod" id="perevod2">
        <p class="block-perevod__title">Перевод по номеру карты клиенту банка</p>

        <form action="{{ route('transaction.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title" value="Перевод по номеру карты клиенту банка">
            <input type="hidden" name="type" value="transfer_to_customer">

            <div class="input-block">
                <p class="input-block__text">Номер карты</p>
                <input type="text" class="input-num" name="number" placeholder="0000 0000 0000 0000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" class="input-num" name="sum" placeholder="Введите сумму">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
    </div>

    <div class="block-perevod" id="perevod6">
        <p class="block-perevod__title">ПЕРЕВОД Qiwi ПО НОМЕРУ телефона</p>

        <form action="{{ route('transaction.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title" value="Перевод Qiwi по номеру телефона">
            <input type="hidden" name="type" value="transfer_qiwi">

            <div class="input-block">
                <p class="input-block__text">Номер телефона</p>
                <input type="tel" class="input-num-phone" name="phone" placeholder="+0 000 000 000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" class="input-num" name="sum" placeholder="Введите сумму">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
    </div>

    <div class="block-perevod" id="perevod7">
        <p class="block-perevod__title">ПЕРЕВОД PayPal ПО НОМЕРУ телефона</p>

        <form action="{{ route('transaction.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title" value="Перевод PayPal по номеру телефона">
            <input type="hidden" name="type" value="transfer_paypal">

            <div class="input-block">
                <p class="input-block__text">Номер телефона</p>
                <input type="tel" class="input-num-phone" name="phone" placeholder="+0 000 000 000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" class="input-num" name="sum" placeholder="Введите сумму">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
    </div>

    <div class="block-perevod" id="perevod8">
        <p class="block-perevod__title">Пополнение мобильного телефона</p>

        <form action="{{ route('transaction.store') }}" method="POST" class="perevod-form">
            @csrf

            <input type="hidden" name="title" value="Пополнение мобильного телефона">
            <input type="hidden" name="type" value="mobile_phone">

            <div class="input-block">
                <p class="input-block__text">Номер телефона</p>
                <input type="tel" class="input-num-phone" name="phone" placeholder="+0 000 000 000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" class="input-num" name="sum" placeholder="Введите сумму">
                <select name="currency" id="">
                    <option value="RUB">₽</option>
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                </select>
            </div>

            <div class="block-link">
                <div class="input-error" style="margin-right: auto;"></div>
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
    </div>

    <div class="block-perevod" id="perevod3">
        <p class="block-perevod__title">ПЕРЕВОД НА ЭЛЕКТРОННЫЙ КОШЕЛЕК</p>

        <form action="#" class="perevod-form">
            <div class="input-block">
                <p class="input-block__text">Номер кошелька</p>
                <input type="text" name="" placeholder="+7 999 999-99-99">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" name="" placeholder="Введите сумму">
                <select name="" id="">
                    <option value="">₽</option>
                    <option value="">$</option>
                    <option value="">€</option>
                </select>
            </div>

            <div class="block-link">
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
    </div>

    <div class="block-perevod" id="perevod4">
        <p class="block-perevod__good">ПЕРЕВОД ВЫПОЛНЕН!</p>
    </div>

    <div class="block-perevod" id="perevod5">
        <p class="block-perevod__title">По реквизитам счета в любой банк</p>

        <form action="#" class="perevod-form">
            <div class="input-block">
                <p class="input-block__text">Номер карты</p>
                <input type="text" name="" placeholder="0000 0000 0000 0000">
            </div>

            <div class="input-block sel">
                <p class="input-block__text">Сумма</p>
                <input type="text" name="" placeholder="Введите сумму">
                <select name="" id="">
                    <option value="">₽</option>
                    <option value="">$</option>
                    <option value="">€</option>
                </select>
            </div>

            <div class="block-link">
                <a href="#" class="block-link__prev">Назад</a>
                <button class="item-serv">Отправить</button>
            </div>
        </form>

        {{-- need to implement: move notifications to a separate template --}}

        @if(session()->has('success'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('success') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="div-text active">
                <p class="div-text__text">
                    {{ session('error') }}
                </p>
                <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
            </div>
        @endif
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