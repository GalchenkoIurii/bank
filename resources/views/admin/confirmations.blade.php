@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заявки на идентификацию</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление заявками</h3>
        </div>
        <div class="card-body table-responsive">
            {{--<a class="btn btn-primary mb-2" href="{{ route('customers.create') }}" role="button">Добавить клиента</a>--}}

            <div class="row mb-3">
                <div class="col">
                    <input type="text" id="search-email" class="form-control" placeholder="Поиск по email"
                           aria-label="Поиск по email">
                </div>
                <div class="col">
                    <input type="text" id="search-ip" class="form-control" placeholder="Поиск по IP"
                           aria-label="Поиск по IP">
                </div>
                <div class="col">
                    <input type="text" id="search-personal-code" class="form-control" placeholder="Поиск по Персональному коду"
                           aria-label="Поиск по Персональному коду">
                </div>
            </div>

            @if(count($customers))
                <table id="customers-table" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Контрольная сумма</th>
                        <th scope="col">Email</th>
                        <th scope="col">IP адрес</th>
                        <th scope="col">Персональный код</th>
                        <th scope="col">Заблокирован</th>
                        <th scope="col">Ожидает идентификации</th>
                        <th scope="col">Идентифицирован</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->login }}</td>
                            <td>{{ $customer->balance->control_sum_lt }}</td>
                            <td class="email">{{ $customer->email }}</td>
                            <td class="ip">{{ $customer->ip_address }}</td>
                            <td class="personal-code">{{ $personal_code . $customer->userData->personal_code }}</td>
                            <td>@if($customer->is_banned) Да @else Нет @endif</td>
                            <td>@if($customer->confirmation) Да @else Нет @endif</td>
                            <td>@if($customer->confirmed) Да @else Нет @endif</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.confirmations.edit', ['confirmation' => $customer->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.confirmations.destroy', ['confirmation' => $customer->id]) }}" method="post" class="">
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