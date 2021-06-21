@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование бланка</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $blank->title_ru }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('blanks.update', ['blank' => $blank->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $blank->slug }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Литовский)</label>
                    <input type="text" class="form-control" id="title_lt" name="title_lt" value="{{ $blank->title_lt }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Английский)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $blank->title_en }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок (Русский)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $blank->title_ru }}">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст (Литовский)</label>
                    <textarea class="form-control" id="text_lt" name="text_lt" rows="4">{{ $blank->text_lt }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст (Английский)</label>
                    <textarea class="form-control" id="text_en" name="text_en" rows="4">{{ $blank->text_en }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст (Русский)</label>
                    <textarea class="form-control" id="text_ru" name="text_ru" rows="4">{{ $blank->text_ru }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection