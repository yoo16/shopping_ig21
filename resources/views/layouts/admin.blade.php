<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  @include('components.error_message')

  <div id="app" class="container">
    <h2 class="h2 p-3 bg-info text-white">{{ $title }}</h2>
    @yield('content')
  </div>
</body>

</html>