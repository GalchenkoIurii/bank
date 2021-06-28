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