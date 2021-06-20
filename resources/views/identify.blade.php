@extends('layouts.logged')

@section('page-title')Подтверждение личных данных @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    @if(auth()->user()->need_confirmation)
        <form id="identifyForm" action="{{ route('user.identify.store') }}" method="post" enctype="multipart/form-data" class="form-two">
            @csrf
            <p class="form-two__title">Подтверждение личных данных держателя счета</p>

            <p class="form-two__text">Ваш счет анонимный, чтобы он был нормальный, заполните доки</p>
            <p class="form-two__text">Подтверждение личных данных, абсолютно <span>бесплатная</span> процедура и не
                подразумевает в себе никаких оплат.</p>
            <p class="form-two__text"><span>Статус аккаунта: Требует подтверждения личности!</span></p>

            <div class="block-text">
                <div class="block-img"><img src="{{ asset('img/str-two/block-right/img-1.png') }}" alt=""></div>
                <div class="page-text">
                    <p class="block-text__title">Введите паспортные данные</p>
                    <p class="block-text__text">Заполните все поля в вашей анкете и загрузите фото/скан вашего документа
                        удостоверяющего личность. Отправьте ее на рассмотрение и дождитесь результата проверки которая
                        занимает от 15-ти до 60-ти минут.</p>
                </div>
            </div>

            <div class="block-input one">
                <p class="block-input__text">Ваше гражданство</p>

                <div class="wrapper-one">
                    <div class="map_wrap">
                        <ul class="map_option">
                            <li>
                                <div class="option">
                                    <img src="{{ asset('img/flag/rus.svg') }}" alt="">
                                    <p>Россия</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="map_ul">
                            <li>
                                <label class="option">
                                    <input type="radio" id="inputRus" name="citizenship" value="Россия">
                                    <img src="{{ asset('img/flag/rus.svg') }}" alt="">
                                    <p>Россия</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Литва">
                                    <img src="{{ asset('img/flag/lt.png') }}" alt="">
                                    <p>Литва</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Казахстан">
                                    <img src="{{ asset('img/flag/kaz.svg') }}" alt="">
                                    <p>Казахстан</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Узбекистан">
                                    <img src="{{ asset('img/flag/uzb.svg') }}" alt="">
                                    <p>Узбекистан</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Беларусь">
                                    <img src="{{ asset('img/flag/bel.svg') }}" alt="">
                                    <p>Беларусь</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Таджикистан">
                                    <img src="{{ asset('img/flag/tad.svg') }}" alt="">
                                    <p>Таджикистан</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Украина">
                                    <img src="{{ asset('img/flag/ua.png') }}" alt="">
                                    <p>Украина</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship" value="Киргизстан">
                                    <img src="{{ asset('img/flag/kir.png') }}" alt="">
                                    <p>Киргизстан</p>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="block-input" id="passportNum">
                <p class="block-input__text">Серия и номер паспорта</p>
                <input type="text" name="passport_num" id="passport_num" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Фамилия</p>
                <input type="text" name="last_name" id="last_name" placeholder="">
            </div>

            <div class="block-input" id="passportIssuerWrapper">
                <p class="block-input__text">Кем выдан</p>
                <input type="text" name="passport_issuer" id="passport_issuer" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Имя</p>
                <input type="text" name="first_name" id="first_name" placeholder="">
            </div>

            <div class="block-input" id="issuerCodeWrapper">
                <p class="block-input__text">Код подразделения</p>
                <input type="text" name="issuer_code" id="issuer_address" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Отчество</p>
                <input type="text" name="patronymic" id="patronymic" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Дата выдачи</p>
                <input type="date" name="issue_date" id="issue_date">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Дата рождения</p>
                <input type="date" name="birth_date" id="birth_date">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Адрес прописки</p>
                <input type="text" name="user_address" id="user_address" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">Пол</p>
                <select name="gender" id="gender">
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                </select>
            </div>

            <div class="block-input one" id="identifyingNum">
                <p class="block-input__text">ИНН</p>
                <input type="text" name="inn" id="inn" placeholder="">
            </div>

            <div class="block-input file">
                <p class="block-input__text">Фото лицевой стороны паспорта.</p>
                <div class="box">
                    <input type="file" name="passport_photo_first" id="passport_photo_first" class="inputfile inputfile-1"
                           data-multiple-caption="{count} files selected" multiple />
                    <label for="passport_photo_first"><span>Choose a file&hellip;</span></label>
                </div>
            </div>

            <div class="block-input one file">
                <p class="block-input__text">Фото прописки из паспорта.</p>
                <div class="box">
                    <input type="file" name="passport_photo_address" id="passport_photo_address" class="inputfile inputfile-2"
                           data-multiple-caption="{count} files selected" multiple />
                    <label for="passport_photo_address"><span>Choose a file&hellip;</span></label>
                </div>
            </div>

            <div class="block-btn">
                <button type="submit">Отправить на рассмотрение</button>
            </div>

        </form>

    @elseif(auth()->user()->confirmation)
        <div class="block-cart two">
            <p class="block-cart__title">Подтверждение личных данных держателя счета</p>
            <p class="block-cart__txt">Ваши паспортные данные проходят проверку службой безопасности...</p>
            <p class="block-cart__txt">Статус аккаунта: Требует подтверждения личности!</p>
        </div>
    @elseif(auth()->user()->confirmed)
        <div class="block-cart two">
            <p class="block-cart__title">Подтверждение личных данных держателя счета</p>
            <p class="block-cart__txt">Ваши личные данные прошли проверку.</p>
            <p class="block-cart__txt active">Статус аккаунта: подтвержденный!</p>
            <p class="block-text__text">Фамилия Имя Отчество: </p><p class="block-cart__txt active">{{ $user_name }}</p>
            <p class="block-text__text">Серия и номер паспорта: </p><p class="block-cart__txt active">{{ $user_passport }}</p>
        </div>
    @endif

    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/custom-file-input.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        });

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
        });

        $(".map_option").click(function(){
            $(this).parent().toggleClass("active");
        });

        $(".map_ul li label").click(function(){
            var currenteleTwo = $(this).html();
            $(".map_option li").html(currenteleTwo);
            $(this).parents(".map_wrap").removeClass("active");
        });
    </script>
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
@endsection