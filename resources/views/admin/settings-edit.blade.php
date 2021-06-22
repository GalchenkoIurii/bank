@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование настройки</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $setting->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update', ['setting' => $setting->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $setting->slug }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Литовский)</label>
                    <input type="text" class="form-control" id="title_lt" name="title_lt" value="{{ $setting->title_lt }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Английский)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $setting->title_en }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Русский)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $setting->title_ru }}">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент (Литовский)</label>
                    <input type="text" class="form-control" id="value_lt" name="value_lt" value="{{ $setting->value_lt }}">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент (Английский)</label>
                    <input type="text" class="form-control" id="value_en" name="value_en" value="{{ $setting->value_en }}">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент (Русский)</label>
                    <input type="text" class="form-control" id="value_ru" name="value_ru" value="{{ $setting->value_ru }}">
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection