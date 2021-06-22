@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Бланки</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление бланками</h3>
        </div>
        <div class="card-body table-responsive">
            <a class="btn btn-primary mb-2" href="{{ route('admin.blanks.create') }}" role="button">Добавить бланк</a>
            @if(count($blanks))
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Слаг</th>
                        <th scope="col">Текст</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blanks as $blank)
                        <tr>
                            <th scope="row">{{ $blank->id }}</th>
                            <td>{{ $blank->title_ru }}</td>
                            <td>{{ $blank->slug }}</td>
                            <td>{{ $blank->text_ru }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.blanks.edit', ['blank' => $blank->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.blanks.destroy', ['blank' => $blank->id]) }}" method="post" class="">
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