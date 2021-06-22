@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование клиента</h1>
        <h3 class="mb-3">Пользователь: {{ $customer->login }}</h3>
    </div>
    <div class="accordion" id="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    Данные клиента
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3>Данные клиента</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.customers.update', ['customer' => $customer->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="login" class="form-label">Логин</label>
                                    <input type="text" class="form-control" id="login" name="login" value="{{ $customer->login }}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Телефон</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
                                </div>
                                <div class="mb-5">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $customer->email }}">
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin"
                                           @if($customer->is_admin) checked @endif>
                                    <label class="form-check-label" for="is_admin">Назначить админом</label>
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <input class="form-check-input" type="checkbox" name="is_banned" id="is_banned"
                                           @if($customer->is_banned) checked @endif>
                                    <label class="form-check-label" for="is_banned">Заблокировать пользователя</label>
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <p class="card-text">Разрешить/запретить вывод средств</p>
                                    <input class="form-check-input" type="checkbox" name="withdrawable" id="withdrawable"
                                           @if($customer->withdrawable) checked @endif>
                                    <label class="form-check-label" for="withdrawable">Разрешить/запретить</label>
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <p class="card-text">Разрешить/запретить отображение номера карты</p>
                                    <input class="form-check-input" type="checkbox" name="show_card" id="show_card"
                                           @if($customer->show_card) checked @endif>
                                    <label class="form-check-label" for="show_card">Разрешить/запретить</label>
                                </div>
                                @if($customer->confirmed)
                                    <p class="card-text">Отменить идентификацию клиента</p>
                                    <div class="form-check form-switch mb-5">
                                        <input class="form-check-input" type="checkbox" name="identifying_refused"
                                               id="identifying_refused">
                                        <label class="form-check-label" for="identifying_refused">Отменить идентификацию</label>
                                    </div>

                                    <div class="mb-5">
                                        <label for="control_sum" class="form-label">Установить/Изменить контрольную сумму</label>
                                        <input type="text" class="form-control" id="control_sum" name="control_sum"
                                               value="{{ $customer->balance->control_sum_lt }}">
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary mb-5">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                    Балансы
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3>Балансы</h3>
                        </div>
                        <div class="card-body">
                            <table id="customers-table" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Логин</th>
                                    <th scope="col">Корр. счет</th>
                                    <th scope="col">Полное имя</th>
                                    <th scope="col">Баланс RUR</th>
                                    <th scope="col">Баланс USD</th>
                                    <th scope="col">Баланс EUR</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $customer->id }}</th>
                                        <td>{{ $customer->login }}</td>
                                        <td class="corr-account">{{ $personal_code . $customer->userData->personal_code }}</td>
                                        <td>{{ $customer->last_name . ' ' . $customer->first_name . ' ' . $customer->patronymic }}</td>
                                        <td>{{ $customer->balance->balance_rur }}</td>
                                        <td>{{ $customer->balance->balance_usd }}</td>
                                        <td>{{ $customer->balance->balance_eur }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.balance.add', ['id' => $customer->id]) }}"
                                               class="btn btn-info btn-sm me-1">+ Пополнить</a>
                                            <a href="{{ route('admin.balance.sub', ['id' => $customer->id]) }}"
                                               class="btn btn-danger btn-sm me-1">- Списать</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                    Уведомления
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3>Уведомления</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.customers.update', ['customer' => $customer->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="login" class="form-label">Логин</label>
                                    <input type="text" class="form-control" id="login" name="login" value="{{ $customer->login }}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Телефон</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
                                </div>
                                <div class="mb-5">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $customer->email }}">
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin"
                                           @if($customer->is_admin) checked @endif>
                                    <label class="form-check-label" for="is_admin">Назначить админом</label>
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <input class="form-check-input" type="checkbox" name="is_banned" id="is_banned"
                                           @if($customer->is_banned) checked @endif>
                                    <label class="form-check-label" for="is_banned">Заблокировать пользователя</label>
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <p class="card-text">Разрешить/запретить вывод средств</p>
                                    <input class="form-check-input" type="checkbox" name="withdrawable" id="withdrawable"
                                           @if($customer->withdrawable) checked @endif>
                                    <label class="form-check-label" for="withdrawable">Разрешить/запретить</label>
                                </div>
                                <div class="form-check form-switch mb-5">
                                    <p class="card-text">Разрешить/запретить отображение номера карты</p>
                                    <input class="form-check-input" type="checkbox" name="show_card" id="show_card"
                                           @if($customer->show_card) checked @endif>
                                    <label class="form-check-label" for="show_card">Разрешить/запретить</label>
                                </div>
                                @if($customer->confirmed)
                                    <p class="card-text">Отменить идентификацию клиента</p>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" name="identifying_refused"
                                               id="identifying_refused">
                                        <label class="form-check-label" for="identifying_refused">Отменить идентификацию</label>
                                    </div>

                                    <div class="mb-3">
                                        <label for="control_sum" class="form-label">Установить/Изменить контрольную сумму</label>
                                        <input type="text" class="form-control" id="control_sum" name="control_sum"
                                               value="{{ $customer->balance->control_sum_lt }}">
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary mb-3">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection