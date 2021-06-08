<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-cont">
                <div class="cont-link">
                    <a href="#" class="top-cont__burger" id="burger"></a>
                    <a href="{{ route('home') }}" class="top-cont__logo">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                        <span>{{ $site_settings['site_name']->value_lt }}</span>
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
                        <a href="{{ route('register.create') }}" class="top-cont__score">Открыть счет</a>
                        <a href="{{ route('login.create') }}" class="top-cont__login">Войти</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="selected-right"></div>
    </div>
</div>