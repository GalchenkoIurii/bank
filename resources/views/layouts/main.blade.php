<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style/main.css') }}">
    <link rel="stylesheet" href="{{ asset('style/media.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
            integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
            crossorigin="anonymous"></script>

    <title>@yield('page-title')</title>

</head>
<body>

@yield('header')
@yield('content')
@yield('footer')

@yield('scripts')
</body>
</html>