<div class="exit-mod">
    <p class="exit-mod__title">{{ __('main.popup.exit_title') }}</p>
    <p class="exit-mod__text">{{ __('main.popup.exit_question') }}</p>

    <a href="#" id="exit-no" class="exit-mod__link one">{{ __('main.no') }}</a>
    <a href="{{ route('logout') }}" class="exit-mod__link two">{{ __('main.yes') }}</a>
</div>