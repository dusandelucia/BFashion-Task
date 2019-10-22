<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Purchase successful</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            Purchase successful!
        </div>
        <div class="title">
            <a class="btn" href="/">
                Continue shopping
            </a>
        </div>
    </div>
</div>
</body>
</html>
