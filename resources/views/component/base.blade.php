<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset(path: 'image/toko.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/Roboto-Regular.ttf') }}">
    <link rel="stylesheet" href="{{ asset('font/Montserrat-Regular.ttf') }}">
    <link rel="stylesheet" href="{{ asset('css/webpage.css') }}">
    <title>TOKO</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    @include('component.navbar')
    <div class="flex-fill my-2">
      @yield('page-content')
    </div>
    @include('component.footer')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
  </body>
</html>