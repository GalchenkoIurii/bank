@extends('layouts.logged')

@section('page-title'){{ __('lending.title') }} @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="kredit-block">
        <p class="kredit-block__title">{{ __('lending.title') }}</p>

        @if($has_reviewing_credits)
            <div class="kredit-item">
                <p class="kredit-item__title">{{ __('lending.has_application') }}</p>
            </div>
        @elseif(auth()->check() && auth()->user()->confirmed)

        @foreach($credits as $credit)
            <div class="kredit-item">
                <p class="kredit-item__title">{{ $credit->__('category') }}</p>
                {!! $credit->__('description') !!}
                <a href="{{ route('lending.category', ['category' => $credit->category_slug]) }}"
                   class="kredit-item__link">{{ __('lending.leave_claim') }}</a>
            </div>
        @endforeach

        @else
            <div class="kredit-item">
                <p class="kredit-item__title">{{ __('lending.identify_text') }}</p>
                <a href="{{ route('user.identify') }}"
                   class="kredit-item__link">{{ __('lending.identify_btn') }}</a>
            </div>
        @endif

        <div class="kredit-item">
            <p class="kredit-item__title"><span>!</span>{{ __('lending.info_title') }}</p>
            <p class="kredit-item__text">{{ __('lending.info_text') }}</p>
            <a href="{{ route('lending.info') }}" class="kredit-item__link">{{ __('lending.info_btn') }}</a>
        </div>
    </div>


    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
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