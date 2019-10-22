<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>All products</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            All products
        </div>

        <div class="all-items">
            @foreach (App\Product::all() as $product)
                <div class="card">
                    Product: <b>{{ $product->name }}</b>
                    <br/>
                    Brand: <b>{{ $product->brand->name }}</b>
                    <br/>
                    Price: <b>{{ $product->price }} euro</b>
                    <br/><br/>
                    <a class="btn" href="/checkout/{{ $product->id }}">BUY</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
