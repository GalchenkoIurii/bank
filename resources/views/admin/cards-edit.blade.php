@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование карты</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $card->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.cards.update', ['card' => $card->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="type" class="form-label">Тип</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $card->type }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $card->title }}">
                </div>
                <div class="mb-3">
                    <label for="privilege_type" class="form-label">Привилегии</label>
                    <select class="form-select" aria-label="Default select example" id="privilege_type" name="privilege_type">
                        @if($card->privilege_type == 'Gold')
                            <option selected value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                        @else
                            <option value="Gold">Gold</option>
                            <option selected value="Silver">Silver</option>
                        @endif
                    </select>
                    {{--<input type="text" class="form-control" id="privilege_type" name="privilege_type" value="{{ $card->privilege_type }}">--}}
                </div>
                <div class="mb-3">
                    <label for="month" class="form-label">Месяц</label>
                    <input type="text" class="form-control" id="month" name="month" value="{{ $card->month }}">
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Год</label>
                    <input type="text" class="form-control" id="year" name="year" value="{{ $card->year }}">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Номер</label>
                    <input type="text" class="form-control" id="number" name="number" value="{{ $card->number }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $card->name }}">
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection