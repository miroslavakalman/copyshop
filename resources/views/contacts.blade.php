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
    <div class="contacts">
        <div class="text">
        <h2>Контакты</h2>
        <p>CopyStar Solutions</p>
        <p>+1 (555) 123-4567</p>
        <p>Часы работы: <br>
            Понедельник-Пятница: 9:00 - 18:00 <br>
            Суббота: 10:00 - 15:00 <br>
            Воскресенье: Выходной</p>
        <p>ТЦ Медведковский, Широкая улица, 13А, <br> Москва, Россия</p>
        </div>
        <img src="img/image 23.png" alt="">
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
</body>
</html>