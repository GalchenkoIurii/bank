@extends('layouts.main')

@section('page-title'){{ __('check.title') }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <div class="container"></div>

    <div class="chek-block">
        <div class="chek-container">
            <div class="block-img"><img src="{{ asset('img/logo.png') }}" alt=""></div>
            <div class="block-info">
                <div class="block-text">
                    <p class="block-text__title">{{ __('check.name') }}</p>
                    <p class="block-text__text">{{ $check_info->__('title') }}</p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">{{ __('check.sum') }}</p>
                    <p class="block-text__text">{{ $check_info->sum }}</p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">{{ __('check.date') }}</p>
                    <p class="block-text__text"><span class="date">{{ $check_info->created_at }}</span></p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">{{ __('check.number') }}</p>
                    <p class="block-text__text">{{ $check_info->id }}</p>
                </div>
            </div>

            <div class="page-info">
                <p class="page-info__title">{{ __('check.info') }} {{ $site_name->__('value') }}</p>

                <div class="block-text">
                    <p class="block-text__title">{{ __('check.address') }}</p>
                    <p class="block-text__text">{{ $address->__('value') }}</p>
                </div>

                <div class="block-text">
                    <p class="block-text__title">{{ __('check.email') }}</p>
                    <a href="mailto:{{ $email->__('value') }}" class="block-text__link">{{ $email->__('value') }}</a>
                </div>

                <div class="block-text">
                    <p class="block-text__title">{{ __('check.phone') }}</p>
                    <a href="tel:{{ $tel->__('value') }}" class="block-text__text">{{ $tel->__('value') }}</a>
                </div>
            </div>

            <p class="text-thank">{{ __('check.thanks') }}</p>
        </div>

    </div>
@endsection

@section('footer')
    @include('incs.footer-home')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.spincrement.min.js') }}"></script>
@endsection