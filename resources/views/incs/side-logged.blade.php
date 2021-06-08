<p class="block-left__logo">
    <a class="block-left__title" href="{{ route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
        {{ $side_settings['site_name']->value_lt }}
    </a>
</p>

<a href="{{ route('finances') }}" class="block-left__link">Мои операции</a>



@if(!empty($side_settings['silver_card']))
    <div class="block-left__linkprod one">
        <p class="type-cart">{{ $side_settings['silver_card']->type }}</p>
        <p class="type-cart2"><img src="{{ asset('img/str-two/block-left/type1.svg') }}" alt=""></p>

        <div class="number-block">
            <div class="left-number">
                <div class="date-block">
                    <p class="date-block__text">{{ $side_settings['silver_card']->month }}</p>
                    <p class="date-block__text">/</p>
                    <p class="date-block__text">{{ $side_settings['silver_card']->year }}</p>
                </div>

                <div class="number-div notranslate">
                    @php
                        $number = str_split($side_settings['silver_card']->number);
                        for ($i = 0; $i < count($number); $i++) {
                            if ($i == 0) {
                                echo "<div class=\"number-item\">
                                    <p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span>
                                    </p>";
                            } elseif ($i == 3 || $i == 7 || $i == 11) {
                                echo "<p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span>
                                    </p></div><div class=\"number-item\">";
                            } elseif ($i == 15) {
                                echo "<p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span>
                                    </p></div>";
                            } else {
                                echo "<p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span></p>";
                            }
                        }
                    @endphp
                </div>

                <div class="name-block">
                    <p class="name-block__name">
                        @if(isset($side_settings['card_owner']))
                            {{ $side_settings['card_owner'] }}
                        @else
                            {{ $side_settings['silver_card']->name }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="right-number">
                @if($side_settings['show_card'])
                    <a href="#" class="right-number__link"><img src="{{ asset('img/str-two/block-left/glas.svg') }}" alt=""></a>
                @endif
            </div>
        </div>

        <p class="type-pos">{{ $side_settings['silver_card']->title }}</p>
    </div>
@endif
@if(!empty($side_settings['gold_card']))
    <div class="block-left__linkprod two">
        <p class="type-cart">{{ $side_settings['gold_card']->type }}</p>
        <p class="type-cart2"><img src="{{ asset('img/str-two/block-left/type2.svg') }}" alt=""></p>

        <div class="number-block">
            <div class="left-number">
                <div class="date-block">
                    <p class="date-block__text">{{ $side_settings['gold_card']->month }}</p>
                    <p class="date-block__text">/</p>
                    <p class="date-block__text">{{ $side_settings['gold_card']->year }}</p>
                </div>

                <div class="number-div notranslate">
                    @php
                        $number = str_split($side_settings['gold_card']->number);
                        for ($i = 0; $i < count($number); $i++) {
                            if ($i == 0) {
                                echo "<div class=\"number-item\">
                                    <p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span>
                                    </p>";
                            } elseif ($i == 3 || $i == 7 || $i == 11) {
                                echo "<p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span>
                                    </p></div><div class=\"number-item\">";
                            } elseif ($i == 15) {
                                echo "<p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span>
                                    </p></div>";
                            } else {
                                echo "<p class=\"number-item__num\">
                                    <span class=\"number-item__simvol active-simvol\">*</span>
                                    <span class=\"number-item__cod active-cod\">" . $number[$i] . "</span></p>";
                            }
                        }
                    @endphp
                </div>

                <div class="name-block">
                    <p class="name-block__name">
                        @if(isset($side_settings['card_owner']))
                            {{ $side_settings['card_owner'] }}
                        @else
                            {{ $side_settings['gold_card']->name }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="right-number">
                @if($side_settings['show_card'])
                    <a href="#" class="right-number__link"><img src="{{ asset('img/str-two/block-left/glas.svg') }}" alt=""></a>
                @endif
            </div>
        </div>

        <p class="type-pos">{{ $side_settings['gold_card']->title }}</p>

        <div class="block-pos">
            <a href="#" class="block-pos__link">Оформить продукт</a>
        </div>
    </div>
@endif

<div class="select-block">
    <p class="select-block__title">Баланс</p>
    <div class="wrapper">
        <div class="title">
        </div>
        <div class="select_wrap">
            <ul class="default_option">
                <li>
                    <div class="option pizza">
                        <p><span>₽</span>{{ $side_settings['balance_rur'] }}</p>
                    </div>
                </li>
            </ul>
            <ul class="select_ul">
                <li>
                    <div class="option pizza">
                        <p><span>₽</span>{{ $side_settings['balance_rur'] }}</p>
                    </div>
                </li>
                <li>
                    <div class="option burger">
                        <p><span>$</span>{{ $side_settings['balance_usd'] }}</p>
                    </div>
                </li>
                <li>
                    <div class="option ice">
                        <p><span>€</span>{{ $side_settings['balance_eur'] }}</p>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>

<div class="select-block two">
    <a href="#" class="select-block__link">Мои реквизиты <img class="l-img" src="{{ asset('img/str-two/block-right/arrow-button.svg') }}" alt=""></a>
</div>

<div class="block-rek">
    <div class="block-info">
        <p class="block-info__title">{{ $side_settings['bank']->title_lt }}</p>
        <p class="block-info__text">{{ $side_settings['bank']->value_lt }}</p>
    </div>

    <div class="block-info">
        <p class="block-info__title">{{ $side_settings['personal_code']->title_lt }}</p>
        <p class="block-info__text">{{ $side_settings['personal_code']->value_lt }}</p>
    </div>

    <div class="block-info">
        <p class="block-info__title">{{ $side_settings['iban']->title_lt }}</p>
        <p class="block-info__text">{{ $side_settings['iban']->value_lt }}</p>
    </div>

    <div class="block-info">
        <p class="block-info__title">{{ $side_settings['swift']->title_lt }}</p>
        <p class="block-info__text">{{ $side_settings['swift']->value_lt }}</p>
    </div>
</div>
<div class="block-price">
    <div class="col-title">
        <p class="row-title"></p>
        <p class="row-title">Покупка</p>
        <p class="row-title">Продажа</p>
    </div>
    <div class="col-text">
        <p class="row-val">$</p>
        <p class="row-text">{{ $side_settings['usd'] }}</p>
        <p class="row-text">{{ $side_settings['usd'] }}</p>
    </div>
    <div class="col-text">
        <p class="row-val">€</p>
        <p class="row-text">{{ $side_settings['eur'] }}</p>
        <p class="row-text">{{ $side_settings['eur'] }}</p>
    </div>
</div>