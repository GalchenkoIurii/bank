@extends('layouts.logged')

@section('page-title'){{ __('main.auth_info.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="finance-block ">
        <p class="finance-block__title">{{ __('main.auth_info.title') }}</p>

        <div class="identification-block">
            <div class="block-text">
                <p class="block-text__title">{{ __('main.auth_info.title') }}</p>
                <p class="block-text__text">{{ __('main.auth_info.control_sum') }}: {{ $control_sum }}</p>
                <p class="block-text__title">{{ __('main.auth_info.text_title') }}</p>
                <p class="block-text__text">{{ __('main.auth_info.text') }}</p>
            </div>
        </div>


    </div>

    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/hammer.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
        })
    </script>
@endsection