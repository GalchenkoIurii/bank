@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заявки на кредит</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление заявками</h3>
        </div>
        <div class="card-body table-responsive">

            {{--<div class="row mb-3">--}}
            {{--<div class="col">--}}
            {{--<input type="text" id="search-email" class="form-control" placeholder="Поиск по email"--}}
            {{--aria-label="Поиск по email">--}}
            {{--</div>--}}
            {{--<div class="col">--}}
            {{--<input type="text" id="search-ip" class="form-control" placeholder="Поиск по IP"--}}
            {{--aria-label="Поиск по IP">--}}
            {{--</div>--}}
            {{--<div class="col">--}}
            {{--<input type="text" id="search-corr-account" class="form-control" placeholder="Поиск по Корр. счету"--}}
            {{--aria-label="Поиск по Корр. счету">--}}
            {{--</div>--}}
            {{--</div>--}}

            @if(!empty($credits))
                <table id="customers-table" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Категория</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Email</th>
                        <th scope="col">На рассмотрении</th>
                        <th scope="col">Решение</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($credits as $credit)
                        <tr>
                            <th scope="row">{{ $credit->id }}</th>
                            <td class="category">
                                {{ $credit->creditSetting->category_ru }}
                            </td>
                            <td class="full-name">{{ $credit->full_name }}</td>
                            <td class="phone">{{ $credit->phone }}</td>
                            <td class="email">{{ $credit->email }}</td>

                            <td>@if($credit->reviewing) Да @else Нет @endif</td>
                            <td>@if($credit->result && !$credit->reviewing) Одобрено
                                @elseif(!$credit->result && !$credit->reviewing) Отказано
                                @else Нет
                                @endif</td>
                            <td class="d-flex">
                                <a href="{{ route('credits.edit', ['credit' => $credit->id]) }}"
                                   class="btn btn-info btn-sm me-1">
                                    @if(!$credit->reviewing)
                                        Просмотреть
                                    @else
                                        Редактировать
                                    @endif
                                </a>
                                <form action="{{ route('credits.destroy', ['credit' => $credit->id]) }}" method="post" class="">
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