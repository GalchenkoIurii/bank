@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление уведомления</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новое уведомление</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.notices.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="blank" class="form-label">Бланки</label>
                    <select class="form-select" aria-label="Default select example" id="blank" name="blank">
                        @if(count($blanks))
                            @foreach($blanks as $blank)
                                <option value="{{ $blank->id }}">{{ $blank->title_lt }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title_lt"
                           value="{{ $blanks[0]->title_lt }}">
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Текст</label>
                    <textarea class="form-control" id="text" name="text_lt" rows="4">{{ $blanks[0]->text_lt }}</textarea>
                </div>
                <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection