@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление карты</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новая карта</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cards.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="type" class="form-label">Тип</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="privilege_type" class="form-label">Привилегии</label>
                    <input type="text" class="form-control" id="privilege_type" name="privilege_type">
                </div>
                <div class="mb-3">
                    <label for="month" class="form-label">Месяц</label>
                    <input type="text" class="form-control" id="month" name="month">
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Год</label>
                    <input type="text" class="form-control" id="year" name="year">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Номер</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection