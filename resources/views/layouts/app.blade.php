<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>
    @yield('styles')
</head>
<body>
    <h1>@yield('title')</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        @yield('content')
    </div>
</body>
