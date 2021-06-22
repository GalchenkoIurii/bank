@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Основные настройки</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление настройками</h3>
        </div>
        <div class="card-body table-responsive">
            <a class="btn btn-primary mb-2" href="{{ route('admin.settings.create') }}" role="button">Добавить настройку</a>
            @if(!empty($settings))
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Слаг</th>
                        <th scope="col">Контент</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $setting)
                        <tr>
                            <th scope="row">{{ $setting->id }}</th>
                            <td>{{ $setting->title_ru }}</td>
                            <td>{{ $setting->slug }}</td>
                            <td>{{ $setting->value_ru }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.settings.edit', ['setting' => $setting->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.settings.destroy', ['setting' => $setting->id]) }}" method="post" class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Подтвердите удаление')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>Данных нет...</div>
            @endif
        </div>
    </div>
@endsection