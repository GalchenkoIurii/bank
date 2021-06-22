@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Карты</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление картами</h3>
        </div>
        <div class="card-body table-responsive">
            {{--<a class="btn btn-primary mb-2" href="{{ route('cards.create') }}" role="button">Добавить карту</a>--}}
            @if(!empty($cards))
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Название</th>
                        <th scope="col">Привилегии</th>
                        <th scope="col">Месяц/Год</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cards as $card)
                        <tr>
                            <th scope="row">{{ $card->id }}</th>
                            <td>{{ $card->type }}</td>
                            <td>{{ $card->title }}</td>
                            <td>{{ $card->privilege_type }}</td>
                            <td>{{ $card->month }} / {{ $card->year }}</td>
                            <td>{{ $card->number }}</td>
                            <td>{{ $card->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.cards.edit', ['card' => $card->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                {{--<form action="{{ route('cards.destroy', ['card' => $card->id]) }}" method="post" class="">--}}
                                    {{--@csrf--}}
                                    {{--@method('DELETE')--}}
                                    {{--<button type="submit" class="btn btn-danger btn-sm"--}}
                                            {{--onclick="return confirm('Подтвердите удаление')">Удалить</button>--}}
                                {{--</form>--}}
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