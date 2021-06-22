@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Идентификация клиента</h1>
    </div>
    <div class="card mb-5">
        <div class="card-header">
            <h3>Пользователь: {{ $customer->login }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.confirmations.update', ['confirmation' => $customer->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card mb-5">
                    <h5 class="card-header">Идентификация клиента</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Фамилия</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="patronymic" class="form-label">Отчество</label>
                            <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{ $customer->patronymic }}">
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Дата рождения</label>
                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $customer->birth_date }}">
                        </div>
                        <div class="mb-3">
                            <label for="inn" class="form-label">ИНН</label>
                            <input type="text" class="form-control" id="inn" name="inn" value="{{ $customer->userData->inn }}">
                        </div>
                        <div class="mb-3">
                            <label for="passport_num" class="form-label">Номер паспорта</label>
                            <input type="text" class="form-control" id="passport_num" name="passport_num"
                                   value="{{ $customer->userData->passport_num }}">
                        </div>
                        <div class="mb-3">
                            <label for="passport_issuer" class="form-label">Кем выдан</label>
                            <input type="text" class="form-control" id="passport_issuer" name="passport_issuer"
                                   value="{{ $customer->userData->passport_issuer }}">
                        </div>
                        <div class="mb-3">
                            <label for="issue_date" class="form-label">Дата выдачи</label>
                            <input type="text" class="form-control" id="issue_date" name="issue_date"
                                   value="{{ $customer->userData->issue_date }}">
                        </div>
                        <div class="mb-3">
                            <label for="issuer_address" class="form-label">Адрес подразделения</label>
                            <input type="text" class="form-control" id="issuer_code" name="issuer_code"
                                   value="{{ $customer->userData->issuer_code }}">
                        </div>
                        <div class="mb-3">
                            <label for="citizenship" class="form-label">Гражданство</label>
                            <input type="text" class="form-control" id="citizenship" name="citizenship"
                                   value="{{ $customer->userData->citizenship }}">
                        </div>
                        <div class="mb-3">
                            <label for="user_address" class="form-label">Адрес прописки</label>
                            <input type="text" class="form-control" id="user_address" name="user_address"
                                   value="{{ $customer->userData->user_address }}">
                        </div>
                        <div class="mb-5">
                            <label for="gender" class="form-label">Пол</label>
                            <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                                @if($customer->gender == 'Мужской')
                                    <option selected value="Мужской">Мужской</option>
                                    <option value="Женский">Женский</option>
                                @else
                                    <option value="Мужской">Мужской</option>
                                    <option selected value="Женский">Женский</option>
                                @endif
                            </select>
                        </div>
                        @if($customer->userData->passport_photo_first || $customer->userData->passport_photo_address)
                            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
                                <div class="bg-light w-50 me-md-3 pb-3 px-3 pb-md-5 px-md-5 text-center overflow-hidden">
                                    <div class="my-3 py-3">
                                        <p class="lead">Фото лицевой стороны паспорта.</p>
                                    </div>
                                    <div class="bg-light mx-auto" style="width: 80%; height: 300px;">
                                        <img class="w-100" src="{{ asset('uploads/' . $customer->userData->passport_photo_first) }}" alt="">
                                    </div>
                                </div>
                                <div class="bg-light w-50 me-md-3 pb-3 px-3 pb-md-5 px-md-5 text-center overflow-hidden">
                                    <div class="my-3 p-3">
                                        <p class="lead">Фото прописки из паспорта.</p>
                                    </div>
                                    <div class="bg-light mx-auto" style="width: 80%; height: 300px;">
                                        <img class="w-100" src="{{ asset('uploads/' . $customer->userData->passport_photo_address) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($customer->confirmation)
                            <p class="card-text">Идентифицировать клиента</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="identified" id="identified">
                                <label class="form-check-label" for="identified">Идентифицировать</label>
                            </div>
                            <p class="card-text">Отказ идентификации</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="identifying_refused" id="identifying_refused">
                                <label class="form-check-label" for="identifying_refused">Отказать</label>
                            </div>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Обновить</button>
            </form>
        </div>
    </div>
@endsection