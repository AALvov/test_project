<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/style.css">
    <title>@yield('title')</title>


</head>
<body>

@include('include.header')


<div class="content" id="main_content">
    @yield('content')
</div>

</body>
</html>
