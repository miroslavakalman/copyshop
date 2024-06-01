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
    <p class="title-log">Регистрация</p>
    <form id="registrationForm" action="{{ route('register') }}" method="post">

        @csrf 
        <label for="name">имя <br>
            <input type="text" name="name" required>
        </label>
        <label for="surname">фамилия <br>
            <input type="text" name="surname" required>
        </label>
        <label for="patronymic">отчество <br>
            <input type="text" name="patronymic">
        </label>
        <label for="login">логин <br>
            <input type="text" name="login" required>
        </label>
        <label for="email">e-mail <br>
            <input type="email" name="email" required>
        </label>
        <label for="password">пароль <br>
            <input type="password" name="password" required>
        </label>
        <label for="password_confirmation">повторите пароль <br>
            <input type="password" name="password_confirmation" required>
        </label>
        <label for="checkbox">Я согласен(-на) с условиями пользования
            <input type="checkbox" name="checkbox" required>
        </label>
        @if(Auth::check() && Auth::user()->is_admin)
        <label for="is_admin">Администратор:</label>
        <input type="checkbox" id="is_admin" name="is_admin">
    @endif
    <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>
