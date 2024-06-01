<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>CopyStar</title>
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
    <p class="title-log">Авторизация</p>
    <form id="loginForm" action="{{ url('/login') }}" method="post">

    @csrf 
        <label for="login">логин <br>
            <input type="login" name="login">
        </label>
        <label for="password">пароль <br>
            <input type="password" name="password">
        </label>
    <button type="submit">Войти</button>
    </form>
    <a href="/register">Нет аккаунта? Зарегистрироваться</a>
</body>
</html>