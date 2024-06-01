<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        img {
            width: 700px;
        }
        .product-card {
            margin-left: 240px;
            display: flex;
            flex-direction: row;
            gap: 80px;
            margin-top: 25px;
        }
        h1 {
            margin-left: 240px;
            margin-top: 80px;
            color: #0773a1;
            font-size: 40px;
        }
        button {
            background-color: #0773a1;
            font-family: 'Montserrat';
            font-weight: 600;
            border-radius: 10px;
            color: white;
            border: none;
            width: 200px;
            height: 60px;
            font-size: 18px;
        }
        .product-wrap .price {
            font-weight: 700;
            color: #0773a1;
            font-size: 32px;
        }
        .product-wrap p {
            color: #0773a1;
            font-size: 24px;
            font-weight: 500;
        }
    </style>
</head>
<body>
<nav>
        <a href="{{ url('/') }}">Главная</a>
        <a href="{{ url('/products') }}">Каталог</a>
        <a href="{{ url('/about') }}">О компании</a>
        <a href="{{ url('/contacts') }}">Где нас найти</a>
        <a href="{{ url('/login') }}">Авторизация</a>
        <a href="{{ url('/cart') }}"><img src="/img/cart.png" alt=""></a>
        <a href="{{ url('/checkout/success') }}"><img src="/img/user.png" alt=""></a>
    </nav>
<h1>{{ $product->name }}</h1>
<div class="product-card">
    <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
    <div class="product-wrap">
        <p>{{ $product->description }}</p>
        <p>Страна-производитель: {{ $product->country }}</p>
        <p>Год производства: {{ $product->year }}</p>
        <p>Модель: {{ $product->model }}</p>
        <p>В наличии: {{ $product->quantity }} шт.</p>
        <p class="price">{{ $product->price }} руб.</p>
        <button onclick="addToCart('{{ route('cart.add') }}', '{{ $product->id }}')">В корзину</button>
    </div>
</div>

<footer>
<nav>
    <a href="{{ url('/') }}">Главная</a>
    <a href="{{ url('/products') }}">Каталог</a>
    <a href="{{ url('/about') }}">О компании</a>
    <a href="{{ url('/contacts') }}">Где нас найти</a>
    <a href="{{ url('/login') }}">Авторизация</a>
</nav>
</footer>

<script>
    function addToCart(route, productId) {
        fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.success);
            }
        })
        .catch(error => console.error('Ошибка:', error));
    }
</script>
</body>
</html>
