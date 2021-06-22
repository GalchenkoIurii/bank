@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование страницы</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $page->title_ru }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pages.update', ['page' => $page->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Литовский)</label>
                    <input type="text" class="form-control" id="title_lt" name="title_lt" value="{{ $page->title_lt }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Английский)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $page->title_en }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название (Русский)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $page->title_ru }}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $page->slug }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание (Литовский)</label>
                    <textarea class="form-control" id="description_lt" name="description_lt"
                              rows="4">{{ $page->description_lt }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание (Английский)</label>
                    <textarea class="form-control" id="description_en" name="description_en"
                              rows="4">{{ $page->description_en }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание (Русский)</label>
                    <textarea class="form-control" id="description_ru" name="description_ru"
                              rows="4">{{ $page->description_ru }}</textarea>
                </div>
                <div class="mb-3">
                    <h3>Правила заполнения блока Контент</h3>
                    <p>[block]Ваш контент[/block] - Блок</p>
                    <p>[h]Ваш контент[/h] - Заголовок блока</p>
                    <p>[p]Ваш контент[/p] - Параграф блока</p>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Контент (Литовский)</label>
                    <textarea class="form-control" id="content_lt" name="content_lt"
                              rows="12">{{ $page->content_lt }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Контент (Английский)</label>
                    <textarea class="form-control" id="content_en" name="content_en"
                              rows="12">{{ $page->content_en }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Контент (Русский)</label>
                    <textarea class="form-control" id="content_ru" name="content_ru"
                              rows="12">{{ $page->content_ru }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="mb-3"><img src="{{ asset('uploads/' . $page->image) }}" alt=""></div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection