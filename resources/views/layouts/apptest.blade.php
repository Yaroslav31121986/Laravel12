<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<div class="flex-center position-ref full-height" id="app">
    <example-component></example-component>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
