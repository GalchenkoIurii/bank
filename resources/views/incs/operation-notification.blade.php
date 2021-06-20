@if(session()->has('error'))
    <div class="div-text active">
        <p class="div-text__text">
            {{ session('error') }}
        </p>
        <a href="" class="div-text__exit"><img src="{{ asset('img/exit.svg') }}" alt=""></a>
    </div>
@endif