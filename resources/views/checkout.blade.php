<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="/style.css">
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
<h1>Оформление заказа</h1>

<form action="{{ route('placeOrder') }}" method="POST">
    @csrf
    <label for="address">Адрес доставки:</label>
    <input type="text" id="address" name="address" required>

    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" required>

    <h2>Товары в корзине:</h2>
    @foreach($cartItems as $item)
        <p>{{ $item->product->name }} - {{ $item->quantity }} шт. - {{ $item->product->price }} руб. за шт.</p>
    @endforeach

    <button type="submit">Оформить заказ</button>
</form>

<footer>
    <nav>
        <a href="{{ url('/') }}">Главная</a>
        <a href="{{ url('/products') }}">Каталог</a>
        <a href="{{ url('/about') }}">О компании</a>
        <a href="{{ url('/contacts') }}">Где нас найти</a>
        <a href="{{ url('/login') }}">Авторизация</a>
    </nav>
</footer>
</body>
</html>
