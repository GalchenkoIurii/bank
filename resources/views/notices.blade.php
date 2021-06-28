@extends('layouts.logged')

@section('page-title'){{ __('main.notices.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="finance-block ">
        <p class="finance-block__title">{{ __('main.notices.title') }}</p>
    </div>

    <div class="operations-block">
        @if(count($notices))
            <div class="operations-cont">
                <div class="operations-item">
                    @foreach($notices as $notice)
                        <div class="item-cont">
                            <div class="left-item">
                                <div class="left-cont">
                                    <div class="left-top">
                                        <p class="left-cont__title">{{ $notice->__('title') }}</p>
                                        <p class="left-cont__time">{{ $notice->created_at }}</p>
                                    </div>
                                    <p class="left-cont__name">{!! $notice->__('text') !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="operations-block__noOperations">{{ __('main.notices.empty') }}</p>
        @endif
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