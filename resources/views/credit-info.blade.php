@extends('layouts.logged')

@section('page-title')Услуги кредитования | Инфо @endsection

@section('side')
    @include('incs.side-logged')
@endsection

@section('header')
    @include('incs.header-logged')
@endsection

@section('content')
    @include('incs.admin-message')

    <div class="kredit-block">
        <p class="kredit-block__title">Loan conditions</p>
        <div>
            What are the full terms of the loan?
            Term: from 1 month to 15 years.
            Amount: from 50,000 to 20,000,000 rubles.
            Interest rate: from 9.5% for all types of loans%. The rate is fixed for the entire crediting period.
            Who can get a loan from our bank?
            You can get a loan if:
            You are between 18 and 70 years old
            You have verified your identity online or during a personal visit to a bank branch.
            How are funds credited?
            The loan is credited to your account, in our bank and access to withdrawal to any cards in the world,
            or through the bank's cash desk
            The loan agreement in our bank, you can download to any electronic medium, in your personal account
            after the funds are credited to you.
            Why do banks refuse a loan?
            The bank decides to approve a loan application using a special mathematical model that takes into
            account very large amounts of data. That is why it is sometimes difficult to name a specific reason
            for refusing a loan. But if there is such an opportunity, the bank will indicate why it did not
            approve the loan in the notification of the refusal. If our bank denied you a loan, try filling out
            a new application by changing the application parameters. This will increase the chance of approval
            for a lower amount than you requested the first time.
        </div>
    </div>

    @include('incs.exit-modal')

@endsection

@section('footer')
    @include('incs.footer-logged')
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
        })
    </script>
@endsection