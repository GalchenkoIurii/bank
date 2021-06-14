@extends('layouts.main')

@section('page-title')Кредитный договор @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <div class="container">{{ $credit_info->credit_agreement }}</div>
    <div class="block-table">
        <table>
            <thead>
            <tr class="tr-top">
                <td>№<br>Платежа</td>
                <td>Дата платежа</td>
                <td>Сумма платежа</td>
                <td>Основной долг</td>
                <td>Начисленные проценты</td>
                <td>Ежемесячные комиссии</td>
                <td>Остаток задолженности</td>
            </tr>
            </thead>
            <tbody>
            {!! $credit_info->payments_table !!}
            {{--<tr class="tr-bottom">--}}
            {{--<td>Итог по кредиту</td>--}}
            {{--<td>1</td>--}}
            {{--<td>2</td>--}}
            {{--<td>3</td>--}}
            {{--<td>4</td>--}}
            {{--<td>5</td>--}}
            {{--<td>6</td>--}}
            {{--</tr>--}}
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    @include('incs.footer-home')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.spincrement.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.clients').spincrement({
                thousandSeparator: "",
                duration: 1200,
                thousandSeparator: ','
            });

            $('.sms').spincrement({
                thousandSeparator: "",
                duration: 1200,
                thousandSeparator: ','
            });

            $('.option').spincrement({
                thousandSeparator: "",
                duration: 1200,
                thousandSeparator: ','
            });
        });
    </script>
@endsection