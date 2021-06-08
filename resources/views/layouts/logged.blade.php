<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('style/library/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/library/component.css') }}">

    <link rel="stylesheet" href="{{ asset('style/two-style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/media.css') }}">
    <link rel="stylesheet" href="{{ asset('style/two-media.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>

    <title>@yield('page-title')</title>

    @if(isset($jivo_script))
        {!! $jivo_script->value !!}
    @endif
</head>
<body>
<div class="block-noactive-two">
    <div class="noactive-header">
        <a href="#" class="noactive-header__prev"><img src="{{ asset('img/prev.svg') }}" alt=""></a>
        <a href="{{ route('home') }}" class="noactive-header__title">{{ $site_settings['site_name']->value_lt }}</a>
        <a href="{{ route('home') }}" class="noactive-header__home"><img src="{{ asset('img/home.svg') }}" alt=""></a>
    </div>
    <div class="noactive-cont">
        <p class="noactive-cont__title">Услуга недоступна.</p>
        <p class="noactive-cont__text">К сожалению, данный продукт Вам временно не доступен</p>
        <a href="#" class="noactive-cont__link">Назад</a>
    </div>
</div>
<div class="str-two">
    <div class="bg-mob"></div>
    <div class="mob-head">
        <a href="{{ route('logout') }}" class="mob-head__link"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
        <p class="mob-head__title">{{ $site_settings['site_name']->value_lt }}</p>
    </div>
    <div class="block-left" id="blockLeft">
        @yield('side')
    </div>
    <div class="block-right one">
        @yield('header')
        @if($errors->any())
            <div class="container mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li class="error-input">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="container mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="container mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger error-input">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</div>
@yield('footer')

@yield('scripts')
</body>
</html>