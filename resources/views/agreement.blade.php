@extends('layouts.main')

@section('page-title') {{ $page_data->title_lt }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <div class="new-str">
        <div class="container">
            <div class="new-cont">
                <p class="new-cont__title">{{ $page_data->title_lt }}</p>

                {!! $page_data->content_lt !!}
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