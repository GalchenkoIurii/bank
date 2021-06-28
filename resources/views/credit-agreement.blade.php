@extends('layouts.main')

@section('page-title'){{ __('lending.credit_agreement') }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <div class="container">{{ $credit_info->credit_agreement }}</div>
    <div class="block-table">
        <table>
            <thead>
            <tr class="tr-top">
                <td>{{ __('lending.payment_num') }}</td>
                <td>{{ __('lending.payment_date') }}</td>
                <td>{{ __('lending.payment_sum') }}</td>
                <td>{{ __('lending.payment_debt') }}</td>
                <td>{{ __('lending.payment_percent') }}</td>
                <td>{{ __('lending.payment_commissions') }}</td>
                <td>{{ __('lending.payment_remain') }}</td>
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