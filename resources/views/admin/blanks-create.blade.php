@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление бланка</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новый бланк</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blanks.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Литовский)</label>
                    <input type="text" class="form-control" id="title_lt" name="title_lt">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Английский)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Русский)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст (Литовский)</label>
                    <textarea class="form-control" id="text_lt" name="text_lt" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст (Английский)</label>
                    <textarea class="form-control" id="text_en" name="text_en" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст (Русский)</label>
                    <textarea class="form-control" id="text_ru" name="text_ru" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection