<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
{{--от сюда--}}
@include('partials.navbar')
{{--до сюда--}}
<div>
    @yield('content')
</div>
</body>
</html>
