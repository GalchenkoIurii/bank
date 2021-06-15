<div class="block-noactive-2">
    <div class="noactive-header">
        <a href="#" class="noactive-header__prev"><img src="{{ asset('img/prev.svg') }}" alt=""></a>
        <a href="{{ route('home') }}" class="noactive-header__title">{{ $site_settings['site_name']->value }}</a>
        <a href="{{ route('home') }}" class="noactive-header__home"><img src="{{ asset('img/home.svg') }}" alt=""></a>
    </div>
    <div class="noactive-cont">
        <p class="noactive-cont__title">Услуга недоступна.</p>
        <p class="noactive-cont__text">Не доступны в связи с вашим местоположением. Данная услуга доступна только резидентам Литвы</p>
        <a href="#" class="noactive-cont__link">Назад</a>
    </div>
</div>