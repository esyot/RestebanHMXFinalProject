<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('js/tailwind.min.js') }}"></script>
    <script src="{{ asset('js/htmx.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
@include('components.navbar')
<div id="main_content">
    @yield('content')
</div>
    
</body>
</html>