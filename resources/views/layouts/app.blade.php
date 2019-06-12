<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.components._head')
<body class="@yield('body_class', '') @if(isset($body_classes)) {{ $body_classes}} @endif">

@yield('content')

@include('layouts.components._foot')
</body>
</html>
