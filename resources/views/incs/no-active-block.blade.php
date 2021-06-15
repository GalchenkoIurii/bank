<div class="block-noactive">
    <div class="noactive-header">
        <a href="#" class="noactive-header__prev"><img src="{{ asset('img/prev.svg') }}" alt=""></a>
        <a href="{{ route('home') }}" class="noactive-header__title">{{ $site_settings['site_name']->value }}</a>
        <a href="{{ route('home') }}" class="noactive-header__home"><img src="{{ asset('img/home.svg') }}" alt=""></a>
    </div>
    <div class="noactive-cont">
        <p class="noactive-cont__title">Услуга недоступна.</p>
        <p class="noactive-cont__text">Для возможности воспользоваться сервисом, Вам, необходимо иметь гражданство Евросоюза.
            Для получение подробной информации, обратитесь к онлайн админстратору банка.</p>
        <a href="#" class="noactive-cont__link">Назад</a>
    </div>
</div>