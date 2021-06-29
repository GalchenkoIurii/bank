<div class="block-fix">
    <a href="{{ route('finances') }}" class="block-fix__link" id="linkLeft">
        <img src="{{ asset('img/block-fix/icon-1.svg') }}" alt="">{{ __('main.header.my_accounts') }}</a>
    <a href="{{ route('notices') }}" class="block-fix__link">
        @if($site_settings['user_notices'])
            <img src="{{ asset('img/block-fix/icon-2-red.svg') }}" alt="">
        @else
            <img src="{{ asset('img/block-fix/icon-2.svg') }}" alt="">
        @endif
        {{ __('main.header.notices') }}</a>
    <a href="{{ route('user.settings') }}" class="block-fix__link">
        <img src="{{ asset('img/block-fix/icon-3.svg') }}" alt="">{{ __('main.header.settings') }}</a>
    <a href="#" class="block-fix__link" id="menuBurger">
        <img src="{{ asset('img/block-fix/icon-4.svg') }}" alt="">{{ __('main.header.menu') }}</a>
</div>