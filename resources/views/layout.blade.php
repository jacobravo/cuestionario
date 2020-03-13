<!doctype html>
<html lang="es">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="{{ asset('js/sweetalert2.js') }}"></script>
        <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-modal.js') }}"></script>
        <script src="{{ asset('/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/css/jquery-modal.css') }}" />
        <link rel="stylesheet" href="{{ asset('/bootstrap/dist/css/bootstrap.min.css') }}">
        <title>Sistema de tickets</title>
        <link rel="favicon" type="image/png" href="">
    </head>
    <body class="text-center" style="display: inline;">
        <div class="container-sm">
            @yield('content')
        </div>
    </body>
</html>

