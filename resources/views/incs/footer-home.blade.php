<footer class="footer">
    <div class="container">
        <div class="footer-cont">
            <div class="block-left">
                <div class="contact-block">
                    <p class="contact-block__title">Контакты</p>

                    <div class="block-tel">
                        <p class="block-tel__text">{{ $site_settings['tel']->title }}</p>
                        <a href="tel:{{ $site_settings['tel']->value }}" class="block-tel__link">{{ $site_settings['tel']->value }}</a>
                    </div>

                    <div class="block-email">
                        <p class="block-email__text">{{ $site_settings['email']->title }}</p>
                        <a href="mailto:{{ $site_settings['email']->value }}" class="block-email__link">{{ $site_settings['email']->value }}</a>
                    </div>

                    <div class="block-time">
                        <p class="block-time__text">{{ $site_settings['time']->title }}</p>
                        <p class="block-time__link">{{ $site_settings['time']->value }}</p>
                    </div>

                    <div class="block-address">
                        <p class="block-address__text">{{ $site_settings['address']->title }}</p>
                        <p class="block-address__link">{{ $site_settings['address']->value }}</p>
                    </div>
                </div>

                <ul class="info-block">
                    <p class="info-block__title">Информация</p>
                    <li class="info-block__item"><a href="{{ route('about') }}" class="info-block__link">О банке</a></li>
                    <li class="info-block__item"><a href="{{ route('agreement') }}" class="info-block__link">Пользовательское соглашение</a></li>
                    <li class="info-block__item"><a href="{{ route('business') }}" class="info-block__link">Для бизнеса</a></li>
                    <li class="info-block__item"><a href="{{ route('confidentiality') }}" class="info-block__link">Конфиденциальность</a></li>
                </ul>
            </div>

            <div class="block-title">
                <p class="block-title__title"><img src="{{ asset('img/logo.png') }}" alt="logo"></p>
                <p class="block-title__title">{{ $site_settings['site_name']->value }}</p>
                <p class="block-title__text">{{ $site_settings['copyright']->value }}</p>
            </div>
        </div>
    </div>
</footer>