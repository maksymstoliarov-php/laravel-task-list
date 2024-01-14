<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>
</head>
<body>
    <h1>@yield('title')</h1>
    <div>
        @yield('content')
    </div>
</body>
