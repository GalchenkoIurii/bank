@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            @if(!$credit->reviewing)
                Просмотр заявки
            @else
                Редактирование заявки
            @endif
        </h1>
    </div>
    <div class="card mb-5">
        <div class="card-header">
            <h3>Заявка ID: {{ $credit->id }}</h3>
        </div>
        <div class="card-body">
            @if($credit->reviewing && !$credit->result)
            <form action="{{ route('credits.update', ['credit' => $credit->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="card mb-5">
                    <h5 class="card-header">Категория кредита</h5>
                    <div class="card-body">
                        {{ $credit->creditSetting->category_ru }}
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Основные данные</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="credit_sum" class="form-label">Сумма кредита</label>
                            <input type="text" class="form-control" id="credit_sum" name="credit_sum"
                                   value="{{ $credit->credit_sum }}">
                        </div>
                        <div class="mb-3">
                            <label for="credit_term" class="form-label">Срок кредита мес.</label>
                            <input type="text" class="form-control" id="credit_term" name="credit_term"
                                   value="{{ $credit->credit_term }}">
                        </div>
                        <div class="mb-3">
                            <label for="percent" class="form-label">Процент</label>
                            <input type="text" class="form-control" id="percent" name="percent"
                                   value="{{ $credit->percent }}">
                        </div>
                        <div class="mb-3">
                            <label for="monthly_payment" class="form-label">Месячный платеж</label>
                            <input type="text" class="form-control" id="monthly_payment" name="monthly_payment"
                                   value="{{ $credit->monthly_payment }}">
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Контактные данные</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">ФИО</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                   value="{{ $credit->full_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ $credit->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{ $credit->email }}">
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Кредитный договор и график платежей</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="credit-agreement" class="form-label">Кредитный договор</label>
                            <textarea class="form-control" id="credit-agreement" name="credit_agreement" rows="20">
                                @if(isset($credit->credit_agreement))
                                    {{ $credit->credit_agreement }}
                                @else
{{--                                    {{ $credit_agreement->text }}--}}
                                @endif
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="payments-table" class="form-label">График платежей</label>
                            <textarea class="form-control" id="payments-table" name="payments_table" rows="12">
                                @if(isset($credit->payments_table))
                                    {{ $credit->payments_table }}
                                @else
{{--                                    {{ $payments_table->text }}--}}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Решение по заявке</h5>
                    <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="result" value="1" id="approve">
                                <label class="form-check-label" for="approve">Одобрить</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="result" value="0" id="refuse" checked>
                                <label class="form-check-label" for="refuse">Отказать</label>
                            </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            </form>
            @else
                <div class="card mb-5">
                    <h5 class="card-header">Категория кредита</h5>
                    <div class="card-body">
                        {{ $credit->creditSetting->category_ru }}
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Основные данные</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="card-text">Сумма кредита</p>
                            <p class="card-text">{{ $credit->credit_sum }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="card-text">Срок кредита мес.</p>
                            <p class="card-text">{{ $credit->credit_term }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="card-text">Процент</p>
                            <p class="card-text">{{ $credit->percent }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="card-text">Месячный платеж</p>
                            <p class="card-text">{{ $credit->monthly_payment }}</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Контактные данные</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="card-text">ФИО</p>
                            <p class="card-text">{{ $credit->full_name }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="card-text">Телефон</p>
                            <p class="card-text">{{ $credit->phone }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="card-text">Email</p>
                            <p class="card-text">{{ $credit->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Кредитный договор</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="card-text">{{ $credit->credit_agreement }}</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">График платежей</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="card-text">{{ $credit->payments_table }}</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <h5 class="card-header">Решение по заявке</h5>
                    <div class="card-body">
                        @if(!$credit->reviewing && !$credit->result)
                            <p class="card-text">Отказано</p>
                        @elseif(!$credit->reviewing && $credit->result)
                            <p class="card-text">Одобрено</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection