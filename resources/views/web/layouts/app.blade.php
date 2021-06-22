<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/all.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:200,400,600&display=swap"
        rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">

    <title>Fadhil Purnahar</title>
</head>

<body>
    @include('web.components.navbar')

    @section('sidebar')

        @include('web.components.carousel')

        @include('web.components.brand')

    @show

    <!-- Features -->

    <section class="features bg-light p-5">

        @yield('content')

    </section>

    <!-- Akhir Features -->

    @include('web.components.ourdesing')

    @include('web.components.footer')


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/js/all.js"></script>
    @yield('script')

</body>

</html>
