<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.components._head')
<body>

@yield('content')

@include('layouts.components._foot')
</body>
</html>
