<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div id="auth">

  <div class="row h-100">
    @yield('content')
  </div>
  </div>

  <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
</body>
</html>
