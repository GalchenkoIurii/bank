@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление настройки</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новая настройка</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Литовский)</label>
                    <input type="text" class="form-control" id="title_lt" name="title_lt">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Английский)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Русский)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент (Литовский)</label>
                    <input type="text" class="form-control" id="value_lt" name="value_lt">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент (Английский)</label>
                    <input type="text" class="form-control" id="value_en" name="value_en">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент (Русский)</label>
                    <input type="text" class="form-control" id="value_ru" name="value_ru">
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection