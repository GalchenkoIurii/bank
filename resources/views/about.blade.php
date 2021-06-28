@extends('layouts.main')

@section('page-title') {{ $page_data->__('title') }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <div class="new-str">
        <div class="container">
            <div class="new-cont">
                <p class="new-cont__title">{{ $page_data->__('title') }}</p>
                <p class="new-cont__text">{{ $page_data->__('description') }}</p>

                <div class="block-career">
                    <div class="block-text">
                        <p class="block-career__title">Career</p>
                        <p class="block-career__text">Being a multinational bank, we take into account the needs
                            of customers in different regions and provide high-quality products and services that
                            are global in nature and at the same time adapted for local markets. At the same time,
                            we observe high ethical standards and always strictly follow the principle of social
                            responsibility. As a result, we have earned a decent reputation in the financial markets.
                            Paying special attention to customer requirements as the main priority of our activities,
                            we also care about employees, as they play a key role in the successful implementation
                            of our strategy. That is why for us as an employer, social values are a very important
                            factor taken into account in employment. In accordance with our core values (cohesion,
                            openness, reliability),</p>
                    </div>

                    <div class="block-img">
                        <img src="{{ asset('img/career-img.png') }}" alt="">
                    </div>
                </div>
                {!! $page_data->__('content') !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection