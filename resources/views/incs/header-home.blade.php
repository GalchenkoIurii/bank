<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-cont">
                <div class="cont-link">
                    <a href="#" class="top-cont__burger" id="burger"></a>
                    <a href="{{ route('home') }}" class="top-cont__logo">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                        <span>{{ $site_settings['site_name']->value }}</span>
                    </a>
                    {{--<a href="{{ route('home') }}" class="top-cont__logo">{{ $site_settings['site_name']->value }}</a>--}}
                    <a href="{{ route('logout') }}" class="top-cont__exit"><img src="{{ asset('img/exit-ak.svg') }}" alt=""></a>
                </div>

                <div class="top-cont__menu-block">
                    <div class="mob-left">
                        <ul class="main-menu" id="indexMenu">
                            <li class="main-menu__item"><a href="{{ route('home') }}#comment" class="main-menu__link">Отзывы</a></li>
                            <li class="main-menu__item"><a href="{{ route('home') }}#services" class="main-menu__link">Популярные услуги</a></li>
                            <li class="main-menu__item"><a href="{{ route('home') }}#info" class="main-menu__link">О компании</a></li>
                        </ul>

                        <div class="currency-block">
                            <p class="currency-block__text"><span>$</span> {{ $site_settings['usd'] }}</p>
                            <p class="currency-block__text"><span>€</span> {{ $site_settings['eur'] }}</p>
                        </div>
                    </div>
                    <div class="block-link">
                        @if(auth()->check() && auth()->user()->is_admin)
                            <a href="{{ route('admin.index') }}" class="top-cont__login">Админпанель</a>
                            <a href="{{ route('finances') }}" class="top-cont__score">В кабинет</a>
                            <a href="{{ route('logout') }}" class="top-cont__login">Выйти</a>
                        @elseif(auth()->check())
                            <a href="{{ route('finances') }}" class="top-cont__score">В кабинет</a>
                            <a href="{{ route('logout') }}" class="top-cont__login">Выйти</a>
                        @else
                            <a href="{{ route('register.create') }}" class="top-cont__score">Открыть счет</a>
                            <a href="{{ route('login.create') }}" class="top-cont__login">Войти</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="selected-right"></div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="bottom-cont">
                <div class="block-title">
                    <p class="bottom-cont__title">{{ $site_settings['site_name']->value }}</p>
                    <p class="bottom-cont__text">{{ $site_settings['site_slogan']->value }}</p>
                    <a href="@if(auth()->check())
                    {{ route('finances') }}
                    @else
                    {{ route('login.create') }}
                    @endif" class="bottom-cont__link">Открыть счет</a>
                </div>

                <div class="block-counter">
                    <p class="block-counter__text"><span class="img-block">
                            <img src="{{ asset('img/index-str/icon-1.svg') }}" alt=""></span>
                        <span class="numeral clients">800000</span>&nbsp;клиентов</p>
                    <p class="block-counter__text"><span class="img-block">
                            <img src="{{ asset('img/index-str/icon-2.svg') }}" alt=""></span>
                        <span class="numeral sms">2143</span>&nbsp;отзывов</p>
                    <p class="block-counter__text"><span class="img-block">
                            <img src="{{ asset('img/index-str/icon-3.svg') }}" alt=""></span>
                        <span class="numeral option">16232252</span>&nbsp;операции</p>
                </div>
            </div>
        </div>
    </div>
</div>