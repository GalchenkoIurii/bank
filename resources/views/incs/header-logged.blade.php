<div class="header">
    <a href="{{ route('home') }}" class="top-cont__logo">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
        <span>{{ $site_settings['site_name']->value_lt }}</span>
    </a>
    {{--<a href="{{ route('home') }}" class="header-logo">{{ $site_settings['site_name']->value_lt }}</a>--}}
    <a href="{{ route('logout') }}" class="header-home"><img src="{{ asset('img/exit-ak.svg') }}" alt=""></a>

    <div class="mob-block">
        <ul class="header-menu">
            <li class="header-menu__item"><a href="{{ route('lending') }}" class="header-menu__link">Услуги кредитования</a></li>
            <li class="header-menu__item"><a href="{{ route('services') }}" class="header-menu__link">Сервисы</a></li>
            <li class="header-menu__item"><a href="{{ route('convert') }}" class="header-menu__link">Конвертация валют</a></li>
            <li class="header-menu__item"><a href="{{ route('investments') }}" class="header-menu__link">Инвестиции</a></li>
            <li class="header-menu__item"><a href="{{ route('profile') }}" class="header-menu__link">Мой профиль</a></li>
            <li class="header-menu__item mod">
                <a href="{{ route('notices') }}" class="header-menu__link notifications">Уведомления<img src="{{ asset('img/str-two/block-right/kolokolchik.svg') }}" alt=""></a>
            </li>
        </ul>

        <div class="block-user">
            <a href="#" class="block-user__link">
                @if(auth()->check())
                    {{ auth()->user()->login }}
                @endif
                <img src="{{ asset('img/str-two/block-right/arrow-button-1.svg') }}" alt="" class="img"></a>

            <div class="user-click">
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.index') }}" class="user-click__link">Админпанель</a>
                @endif
                <a href="{{ route('user.settings') }}" class="user-click__link">Настройки анкеты</a>
                <a href="{{ route('logout') }}" class="user-click__link userExit">Выход</a>
            </div>
        </div>

        <div class="wrapper">
            <div class="title">
            </div>
            <div class="select_wrap">

                <ul class="default_option">
                    <li>
                        <div class="option pizza">
                            <img src="{{ asset('img/str-two/block-right/flag_ru.png') }}" alt="">
                            <p></p>
                        </div>
                    </li>
                </ul>
                <ul class="select_ul language">
                    <li>
                        <div class="option">
                            <img src="{{ asset('img/str-two/block-right/flag_ru.png') }}" alt="ru" data-google-lang="ru" class="language__img">
                            <p></p>
                        </div>
                    </li>
                    <li>
                        <div class="option">
                            <img src="{{ asset('img/str-two/block-right/flag_eng.png') }}" alt="en" data-google-lang="en" class="language__img">
                            <p></p>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>
