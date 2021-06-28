<div class="header">
    <a href="{{ route('home') }}" class="top-cont__logo">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
        <span>{{ $site_settings['site_name']->__('value') }}</span>
    </a>
    {{--<a href="{{ route('home') }}" class="header-logo">{{ $site_settings['site_name']->value_lt }}</a>--}}
    <a href="{{ route('logout') }}" class="header-home"><img src="{{ asset('img/exit-ak.svg') }}" alt=""></a>

    <div class="mob-block">
        <ul class="header-menu">
            <li class="header-menu__item"><a href="{{ route('lending') }}" class="header-menu__link">{{ __('main.header.lending') }}</a></li>
            <li class="header-menu__item"><a href="{{ route('services') }}" class="header-menu__link">{{ __('main.header.services') }}</a></li>
            <li class="header-menu__item"><a href="{{ route('convert') }}" class="header-menu__link">{{ __('main.header.convert') }}</a></li>
            <li class="header-menu__item"><a href="{{ route('investments') }}" class="header-menu__link">{{ __('main.header.investments') }}</a></li>
            <li class="header-menu__item"><a href="{{ route('profile') }}" class="header-menu__link">{{ __('main.header.profile') }}</a></li>
            <li class="header-menu__item mod">
                <a href="{{ route('notices') }}" class="header-menu__link notifications">{{ __('main.header.notices') }}
                    @if($site_settings['user_notices'])
                        <img src="{{ asset('img/str-two/block-right/kolokolchik-red.svg') }}" alt="">
                    @else
                        <img src="{{ asset('img/str-two/block-right/kolokolchik.svg') }}" alt="">
                    @endif
                </a>
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
                    <a href="{{ route('admin.index') }}" class="user-click__link">{{ __('main.header.admin') }}</a>
                @endif
                <a href="{{ route('user.settings') }}" class="user-click__link">{{ __('main.header.settings') }}</a>
                <a href="{{ route('logout') }}" class="user-click__link userExit">{{ __('main.header.exit') }}</a>
            </div>
        </div>

        <div class="wrapper">
            <div class="title">
            </div>
            <div class="select_wrap3">

                <ul class="default_option3">
                    <li>
                        <div class="option pizza">
                            @if (session('locale') === 'lt')
                                <img src="{{ asset('img/flag/lt.png') }}" alt="lt">
                            @elseif (session('locale') === 'en')
                                <img src="{{ asset('img/flag/gb.png') }}" alt="en">
                            @else
                                <img src="{{ asset('img/flag/rus.svg') }}" alt="ru">
                            @endif
                            <p></p>
                        </div>
                    </li>
                </ul>
                <ul class="select_ul3 language">
                    <li>
                        <div class="option pizza">
                            <a href="{{ route('locale', ['locale' => 'lt']) }}">
                                <img src="{{ asset('img/flag/lt.png') }}" alt="lt" class="language__img">
                                <p>Lit</p>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="option burger">
                            <a href="{{ route('locale', ['locale' => 'en']) }}">
                                <img src="{{ asset('img/flag/gb.png') }}" alt="en" class="language__img">
                                <p>Eng</p>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="option ice">
                            <a href="{{ route('locale', ['locale' => 'ru']) }}">
                                <img src="{{ asset('img/flag/rus.svg') }}" alt="ru" class="language__img">
                                <p>Rus</p>
                            </a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>
