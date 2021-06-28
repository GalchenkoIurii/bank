<div class="block-noactive-2">
    <div class="noactive-header">
        <a href="#" class="noactive-header__prev"><img src="{{ asset('img/prev.svg') }}" alt=""></a>
        <a href="{{ route('home') }}" class="noactive-header__title">{{ $site_settings['site_name']->__('value') }}</a>
        <a href="{{ route('home') }}" class="noactive-header__home"><img src="{{ asset('img/home.svg') }}" alt=""></a>
    </div>
    <div class="noactive-cont">
        <p class="noactive-cont__title">{{ __('main.not_available') }}</p>
        <p class="noactive-cont__text">{{ __('main.popup.unavailable_text_2') }}</p>
        <a href="#" class="noactive-cont__link">{{ __('main.back') }}</a>
    </div>
</div>