@extends('layouts.logged')

@section('page-title'){{ __('identify.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    @if(auth()->user()->need_confirmation)
        <form id="identifyForm" action="{{ route('user.identify.store') }}" method="post"
              enctype="multipart/form-data" class="form-two">
            @csrf
            <p class="form-two__title">{{ __('identify.subtitle') }}</p>

            <p class="form-two__text">{{ __('identify.text_first') }}</p>
            <p class="form-two__text">{!! __('identify.text_second') !!}</p>
            <p class="form-two__text"><span>{{ __('identify.need_confirm') }}</span></p>

            <div class="block-text">
                <div class="block-img"><img src="{{ asset('img/str-two/block-right/img-1.png') }}" alt=""></div>
                <div class="page-text">
                    <p class="block-text__title">{{ __('identify.data.title') }}</p>
                    <p class="block-text__text">{{ __('identify.data.desc') }}</p>
                </div>
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.citizenship') }}</p>

                <div class="wrapper-one">
                    <div class="map_wrap">
                        <ul class="map_option">
                            <li>
                                <div class="option">
                                    <img src="{{ asset('img/flag/rus.svg') }}" alt="">
                                    <p>{{ __('identify.data.rus') }}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="map_ul">
                            <li>
                                <label class="option">
                                    <input type="radio" id="inputRus" name="citizenship"
                                           value="{{ __('identify.data.rus') }}">
                                    <img src="{{ asset('img/flag/rus.svg') }}" alt="">
                                    <p>{{ __('identify.data.rus') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.lit') }}">
                                    <img src="{{ asset('img/flag/lt.png') }}" alt="">
                                    <p>{{ __('identify.data.lit') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.kaz') }}">
                                    <img src="{{ asset('img/flag/kaz.svg') }}" alt="">
                                    <p>{{ __('identify.data.kaz') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.uz') }}">
                                    <img src="{{ asset('img/flag/uzb.svg') }}" alt="">
                                    <p>{{ __('identify.data.uz') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.bel') }}">
                                    <img src="{{ asset('img/flag/bel.svg') }}" alt="">
                                    <p>{{ __('identify.data.bel') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.tag') }}">
                                    <img src="{{ asset('img/flag/tad.svg') }}" alt="">
                                    <p>{{ __('identify.data.tag') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.ukr') }}">
                                    <img src="{{ asset('img/flag/ua.png') }}" alt="">
                                    <p>{{ __('identify.data.ukr') }}</p>
                                </label>
                            </li>
                            <li>
                                <label class="option">
                                    <input type="radio" name="citizenship"
                                           value="{{ __('identify.data.kir') }}">
                                    <img src="{{ asset('img/flag/kir.png') }}" alt="">
                                    <p>{{ __('identify.data.kir') }}</p>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="block-input" id="passportNum">
                <p class="block-input__text">{{ __('identify.data.passport_num') }}</p>
                <input type="text" name="passport_num" id="passport_num" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.last_name') }}</p>
                <input type="text" name="last_name" id="last_name" placeholder="">
            </div>

            <div class="block-input" id="passportIssuerWrapper">
                <p class="block-input__text">{{ __('identify.data.passport_issuer') }}</p>
                <input type="text" name="passport_issuer" id="passport_issuer" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.first_name') }}</p>
                <input type="text" name="first_name" id="first_name" placeholder="">
            </div>

            <div class="block-input" id="issuerCodeWrapper">
                <p class="block-input__text">{{ __('identify.data.issuer_address') }}</p>
                <input type="text" name="issuer_code" id="issuer_address" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.patronymic') }}</p>
                <input type="text" name="patronymic" id="patronymic" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.issue_date') }}</p>
                <input type="date" name="issue_date" id="issue_date">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.birth_date') }}</p>
                <input type="date" name="birth_date" id="birth_date">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.user_address') }}</p>
                <input type="text" name="user_address" id="user_address" placeholder="">
            </div>

            <div class="block-input one">
                <p class="block-input__text">{{ __('identify.data.gender') }}</p>
                <select name="gender" id="gender">
                    <option value="{{ __('identify.data.male') }}">{{ __('identify.data.male') }}</option>
                    <option value="{{ __('identify.data.female') }}">{{ __('identify.data.female') }}</option>
                </select>
            </div>

            <div class="block-input one" id="identifyingNum">
                <p class="block-input__text">{{ __('identify.data.inn') }}</p>
                <input type="text" name="inn" id="inn" placeholder="">
            </div>

            <div class="block-input file">
                <p class="block-input__text">{{ __('identify.data.passport_photo_first') }}</p>
                <div class="box">
                    <input type="file" name="passport_photo_first" id="passport_photo_first" class="inputfile inputfile-1"
                           data-multiple-caption="{count} files selected" multiple />
                    <label for="passport_photo_first"><span>Choose a file&hellip;</span></label>
                </div>
            </div>

            <div class="block-input one file">
                <p class="block-input__text">{{ __('identify.data.passport_photo_address') }}</p>
                <div class="box">
                    <input type="file" name="passport_photo_address" id="passport_photo_address" class="inputfile inputfile-2"
                           data-multiple-caption="{count} files selected" multiple />
                    <label for="passport_photo_address"><span>Choose a file&hellip;</span></label>
                </div>
            </div>

            <div class="block-btn">
                <button type="submit">{{ __('identify.send') }}</button>
            </div>

        </form>

    @elseif(auth()->user()->confirmation)
        <div class="block-cart two">
            <p class="block-cart__title">{{ __('identify.confirmation.title') }}</p>
            <p class="block-cart__txt">{{ __('identify.confirmation.text') }}</p>
            <p class="block-cart__txt">{{ __('identify.confirmation.status') }}</p>
        </div>
    @elseif(auth()->user()->confirmed)
        <div class="block-cart two">
            <p class="block-cart__title">{{ __('identify.confirmation.title') }}</p>
            <p class="block-cart__txt">{{ __('identify.confirmed.text') }}</p>
            <p class="block-cart__txt active">{{ __('identify.confirmed.status') }}</p>
            <p class="block-text__text">{{ __('identify.confirmed.name') }} </p>
            <p class="block-cart__txt active">{{ $user_name }}</p>
            <p class="block-text__text">{{ __('identify.confirmed.passport') }} </p>
            <p class="block-cart__txt active">{{ $user_passport }}</p>
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