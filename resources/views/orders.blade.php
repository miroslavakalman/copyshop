<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заказы</title>
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
<h1>Мои заказы</h1>

@foreach($orders as $order)
    <div class="order">
        <h2>Заказ #{{ $order->id }}</h2>
        <p>Статус: {{ $order->status }}</p>
        <p>Адрес доставки: {{ $order->address }}</p>
        <p>Телефон: {{ $order->phone }}</p>
        <p>Сумма заказа: {{ $order->total }} руб.</p>
        <h3>Товары:</h3>
        <ul>
            @foreach($order->items as $item)
                <li>{{ $item->product->name }} - {{ $item->quantity }} шт. - {{ $item->price }} руб. за шт.</li>
            @endforeach
        </ul>
    </div>
@endforeach

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
