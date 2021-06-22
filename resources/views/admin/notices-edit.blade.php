@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование уведомления</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $notice->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.notices.update', ['notice' => $notice->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Литовский)</label>
                    <input type="text" class="form-control" id="title_lt" name="title_lt" value="{{ $notice->title_lt }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Английский)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $notice->title_en }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Русский)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $notice->title_ru }}">
                </div>
                {{--<div class="mb-3">--}}
                    {{--<label for="blank" class="form-label">Бланки</label>--}}
                    {{--<select class="form-select" aria-label="Default select example" id="blank" name="blank">--}}
                        {{--@if(count($blanks))--}}
                            {{--@foreach($blanks as $blank)--}}
                                {{--<option value="{{ $blank->id }}">{{ $blank->title_lt }}</option>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="mb-3">--}}
                    {{--<label for="text" class="form-label">Текст</label>--}}
                    {{--<textarea class="form-control" id="text" name="text" rows="4">{{ $notice->text }}</textarea>--}}
                {{--</div>--}}

                <div class="mb-3">
                    <label for="text_lt" class="form-label">Текст (Литовский)</label>
                    <textarea class="form-control" id="text_lt" name="text_lt" rows="4">{{ $notice->text_lt }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="text_en" class="form-label">Текст (Английский)</label>
                    <textarea class="form-control" id="text_en" name="text_en" rows="4">{{ $notice->text_en }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="text_ru" class="form-label">Текст (Русский)</label>
                    <textarea class="form-control" id="text_ru" name="text_ru" rows="4">{{ $notice->text_ru }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection