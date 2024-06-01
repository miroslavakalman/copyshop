<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CopyStar</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<nav>
    <a href="{{ url('/') }}">Главная</a>
    <a href="{{ url('/products') }}">Каталог</a>
    <a href="{{ url('/about') }}">О компании</a>
    <a href="{{ url('/contacts') }}">Где нас найти</a>
    <a href="{{ url('/login') }}">Авторизация</a>
    <a href="{{ url('/cart') }}">Корзина</a>
</nav>
<li><a href="{{ route('admin.users.index') }}">Управление пользователями</a></li>
<li><a href="{{ route('admin.products.index') }}">Управление товарами</a></li>

    @yield('content')

</body>
</html>

