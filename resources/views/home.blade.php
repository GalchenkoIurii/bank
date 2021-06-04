@extends('layouts.main')

@section('page-title')Главная@endsection

@section('header')
    @include('incs.header-home')
@endsection

@section('content')
    <div class="two-block" id="info">
        <div class="container">
            <div class="two-cont">
                <div class="block-left">
                    <p class="two-cont__title">{{ $site_name }}</p>
                    <p class="two-cont__text">Современный банк с надежной защитой! Простое и бесплатное открытие счета!
                        Все Ваши средства в нашем онлайн банке надежно защищенны с помощью современных ключей шифрования.
                        Нам доверяют люди по всему миру, совершая ежедневные переводы и покупки.  Абсолютно для всех, переводы без комиссий!</p>
                    <a href="{{ route('about') }}" class="two-cont__link">Узнать о нас больше</a>
                </div>
                <div class="img-block"><img src="{{ asset('img/index-str/img-two-section.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- two-block end-->

    <!-- three-block -->
    <div class="three-block">
        <div class="container">
            <div class="three-cont">
                <p class="three-cont__title">ПРЕИМУЩЕСТВА НАШЕГО ОНЛАЙН-БАНКА</p>

                <div class="block-cont">
                    <div class="block-left">
                        <p class="block-left__text-title">Клиентская служба поддержки банка, ответит на все ваши вопросы в любое время суток</p>
                        <p class="block-left__text">Агенты службы поддержки, работают круглосуточно и готовы ответить на ваши вопросы в любое время суток.
                            Работаем без перерыва и выходных!</p>
                    </div>
                    <div class="img-block"><img src="{{ asset('img/index-str/img-three-section.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <!-- three-block end-->

    <!-- four-block -->
    <div class="four-block">
        <div class="container">
            <div class="four-cont">
                <div class="img-block"><img src="{{ asset('img/index-str/img-four-section.png') }}" alt=""></div>
                <div class="block-right">
                    <p class="block-right__text-title">Сервера онлайн банка, всегда работают быстро и без задержек!</p>
                    <p class="block-right__text">Наш банк установлен на лучших современных серверах нашего времени, а это
                        значит моментальное зачисление транзакций из любой точки мира!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- four-block end-->

    <!-- five-block -->
    <div class="five-block">
        <div class="container">
            <div class="five-cont">
                <div class="block-left">
                    <p class="block-left__text-title">Имеем множество банков партнеров, для удобства клиентов!</p>
                    <p class="block-left__text">Наш онлйан банк имеет множество банков партнеров по всему миру, что
                        позволяет совершать переводы в другие банки без комиссий и тем самым обеспечить комфорт нашим клиентам!</p>
                </div>
                <div class="img-block"><img src="{{ asset('img/index-str/img-five-section.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- five-block end-->

    <!-- six-block -->
    <div class="six-block" id="services">
        <div class="container">
            <div class="six-cont">
                <p class="six-cont__title">ПОПУЛЯРНЫЕ УСЛУГИ</p>

                <div class="block-item">
                    <div class="six-item">
                        <div class="img-block"><img src="{{ asset('img/index-str/img-six-item-1.png') }}" alt=""></div>
                        <div class="block-text">
                            <p class="block-text__title">Дебетовая карта</p>
                            <p class="block-text__text">-Перевод средств в любой банк партнер* без комиссий</p>
                            <p class="block-text__text">- Получайте и отправляйте переводы по всему миру моментально</p>
                            <p class="block-text__text">- Бесплатное обслуживание</p>
                            <a href="@if(auth()->check())
                            {{ route('finances') }}
                            @else
                            {{ route('login.create') }}
                            @endif" class="block-text__link">Оформить карту</a>
                        </div>
                    </div>

                    <div class="six-item">
                        <div class="img-block"><img src="{{ asset('img/index-str/img-six-item-2.png') }}" alt=""></div>
                        <div class="block-text">
                            <p class="block-text__title">Кредит для частных и юр.лиц</p>
                            <p class="block-text__text">- Одобрение в день обращения. Оформите заявку и получите деньги на следующий день, не выходя из дома</p>
                            <p class="block-text__text">- Получение кредита на ваш счет в нашем банке без подтверждения цели кредита, справок о доходах и поручителей</p>
                            <a href="@if(auth()->check())
                            {{ route('lending') }}
                            @else
                            {{ route('login.create') }}
                            @endif" class="block-text__link">Получить кредит</a>
                        </div>
                    </div>

                    <div class="six-item">
                        <div class="img-block"><img src="{{ asset('img/index-str/img-six-item-3.png') }}" alt=""></div>
                        <div class="block-text">
                            <p class="block-text__title">Инвестирование</p>
                            <p class="block-text__text">- Помощь в сборе первого инвестиционного портфеля</p>
                            <p class="block-text__text">- Мгновенный вывод депозита без комиссий, круглосуточно</p>
                            <p class="block-text__text">- Если биржа закрыта на ночь или выходной, откроем счет на следующий торговый день</p>
                            <a href="@if(auth()->check())
                            {{ route('investments') }}
                            @else
                            {{ route('login.create') }}
                            @endif" class="block-text__link">Стать инвестором</a>
                        </div>
                    </div>

                    <div class="six-item">
                        <div class="img-block"><img src="{{ asset('img/index-str/img-six-item-4.png') }}" alt=""></div>
                        <div class="block-text">
                            <p class="block-text__title">Страхование</p>
                            <p class="block-text__text">- 6 видов страхования</p>
                            <p class="block-text__text">- Надежная защита и контроль качества</p>
                            <p class="block-text__text">- Онлайн запись на любой вид страхования</p>
                            <p class="block-text__text">- Получения полиса по электронной почте до 1 дня, в зависимости от вида страховния</p>
                            <a href="@if(auth()->check())
                            {{ route('services') }}
                            @else
                            {{ route('login.create') }}
                            @endif" class="block-text__link">Рассчет стоимости</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- six-block end-->

    <!-- seven-block -->
    <div class="seven-block" id="comment">
        <div class="container">
            <div class="seven-cont">
                <p class="seven-cont__title">ПОСЛЕДНИЕ ОТЗЫВЫ КЛИЕНТОВ</p>

                <div class="block-comment">
                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img1.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Alexander Saydaev</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">I like the bank very much! Transactions are transferred instantly.
                            I am glad that there is no commission for transfers to other banks! I like the bank very much! </p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img2.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Akimov Alexander</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">I opened an account based on the recommendations of my friends!
                            After a month we have already approved the loan! Great bank with low interest!</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img3.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Andreev Dmitry</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star-two.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">I have been using the online bank for 2 years, for all the time
                            there have been no difficulties! A very convenient bank service through which you can book a
                            plane ticket! Well suited for businessmen and people who simply have little time.</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img4.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Antonov Ivan</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">I have been using this bank for over a year, I really like that
                            through the services of the bank, you can order an insurance policy at a bargain price. Very
                            low interest on the loan. I will definitely recommend this online bank to my work colleagues!</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img5.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Belova Elizaveta</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">Convenient and quick withdrawal without commissions, the support
                            service always promptly answers questions and helps in any question! I opened an account on
                            the recommendation of my friends and I really like everything!</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img6.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Bykov Ivan</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">not so long ago entered the Russian retail market, so there are
                            some inconsistencies in the operation of the systems, although personally for me nothing
                            critical happened. The fact that I received a loan at a low interest rate immediately to the
                            card is more than satisfied with me! Fair and transparent card transactions, including
                            exchanges, the best rates and card commissions, are unrivaled among all the banks I have used.</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img7.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Dmitrieva Margarita</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">The bank conducted an investigation and returned the money for
                            the operation, which was carried out without providing the service.
                            The communication of the bank representatives with me was very comfortable and professional:
                            they quickly and clearly collected all the information over the phone, made a check,
                            instructed on my actions that could help in considering the issue, clearly and clearly set
                            the deadlines, and professionally met my expectations. I am very satisfied and recommend the</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img8.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Egorov Svyatoslav</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">Good time, the best bank, everything is at the highest level,
                            fast, convenient, professionals in their field.</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img9.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Demyanov Victor</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">I would like to express my gratitude to the bank's employees for
                            their prompt consideration of my application No. 78563510 and for making a positive decision
                            on the matter. Despite the weekend, the appeal was considered in less than a day.</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>

                    <div class="comment-item">
                        <div class="block-piple">
                            <div class="img-block"><img src="{{ asset('img/comment/img1.png') }}" alt=""></div>
                            <div class="block-name">
                                <p class="block-name__name">Zakharov Dmitry</p>
                                <div class="block-star">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                    <img src="{{ asset('img/index-str/img-seven-comment-star.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <p class="comment-item__text">I express my gratitude to the management and employees for their
                            excellent work! I have repeatedly contacted this office for various questions and each time
                            I admired the excellent service. The staff is always ready to help, very polite, but at the
                            same time vigilant, clearly follow the necessary instructions.</p>

                        <a href="javascript:;" class="comment-item__link">Развернуть</a>
                    </div>
                </div>

                <div class="block-link">
                    <a href="#" class="block-link__link">Посмотреть другие отзывы</a>
                </div>
            </div>
        </div>
    </div>
    <!-- seven-block end-->
@endsection

@section('footer')
    @include('incs.footer-home')
@endsection

@section('scripts')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.spincrement.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.clients').spincrement({
                thousandSeparator: "",
                duration: 3000,
                thousandSeparator: ','
            });

            $('.sms').spincrement({
                thousandSeparator: "",
                duration: 3000,
                thousandSeparator: ','
            });

            $('.option').spincrement({
                thousandSeparator: "",
                duration: 3000,
                thousandSeparator: ','
            });
        });
    </script>
@endsection