@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Списание с баланса пользователя</h1>
    </div>
    <div class="card mb-5">
        <div class="card-header">
            <h3>Пользователь: {{ $customer->login }}</h3>
            <h3>Персональный код: {{ $personal_code . $customer->userData->personal_code }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.balance.sub.update', ['id' => $customer->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="balance_rur" class="form-label">Баланс RUR - <b>{{ $customer->balance->balance_rur }}</b></label>
                    <input type="text" class="form-control" id="balance_rur" name="balance_rur">
                </div>
                <div class="mb-3">
                    <label for="balance_usd" class="form-label">Баланс USD - <b>{{ $customer->balance->balance_usd }}</b></label>
                    <input type="text" class="form-control" id="balance_usd" name="balance_usd">
                </div>
                <div class="mb-3">
                    <label for="balance_eur" class="form-label">Баланс EUR - <b>{{ $customer->balance->balance_eur }}</b></label>
                    <input type="text" class="form-control" id="balance_eur" name="balance_eur">
                </div>

                <div class="mb-3">
                    <label for="blank" class="form-label">Бланки</label>
                    <select class="form-select" aria-label="Default select example" id="blank" name="blank">
                        @if(count($blanks))
                            @foreach($blanks as $blank)
                                <option value="{{ $blank->id }}">{{ $blank->title_lt }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ $blanks[0]->title_lt }}">
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Текст</label>
                    <textarea class="form-control" id="text" name="text" rows="4">{{ $blanks[0]->text_lt }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Списать</button>
            </form>
        </div>
    </div>
@endsection