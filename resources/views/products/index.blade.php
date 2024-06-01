<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары CopyStar</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        h1 {
            font-family: 'Dela Gothic One';
            color: #0773a1;
            margin-top: 100px;
            margin-left: 140px;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            margin-left: 20px;
        }
        .product {
            border: 1px solid #ccc;
            background-color: #f6f8f9;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }
        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product h2 {
            margin-bottom: 10px;
            font-size: 1.2em;
        }
        .product p {
            margin-bottom: 5px;
        }
        .product .price {
            font-weight: bold;
            color: #0773a1;
        }
        label {
            font-size: 14px;
        }
        button {
            background-color: #0773a1;
            font-family: 'Montserrat';
            font-weight: 600;
            border-radius: 5px;
            color: white;
            border: none;
            width: 130px;
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
<h1>Товары</h1>
<form action="{{ route('products.filter') }}" method="GET" style="margin-left: 140px;">
    <label for="category">Категории:</label>
    <select name="category" id="category">
        <option value="">Все категории</option>
        <option value="Laser Printers">Лазерные принтеры</option>
        <option value="Inkjet Printers">Струйные принтеры</option>
        <option value="Thermal Printers">Термопринтеры</option>
        <option value="Cartridge">Картриджи</option>
        <option value="Scanner">Сканнеры</option>
    </select>

    <label for="price">Цена:</label>
    <select name="price" id="price">
        <option value="">Любая цена</option>
        <option value="low_to_high">По возрастанию</option>
        <option value="high_to_low">По убыванию</option>
    </select>

    <label for="year">Год производства:</label>
    <select name="year" id="year">
        <option value="">Любой</option>
    </select>

    <button type="submit">Отфильтровать</button>
</form>
<div class="products">
    @foreach($products as $product)
        @if($product->quantity > 0) 
            <div class="product" onclick="window.location.href='{{ route('product.show', $product->id) }}'">
                <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p class="price">{{ $product->price }} руб.</p>
                <div class="buttons-wrap">
                    <button onclick="event.stopPropagation(); addToCart('{{ route('cart.add') }}', '{{ $product->id }}')">В корзину</button>
                    <button onclick="window.location.href='{{ route('product.show', $product->id) }}'">Подробнее</button>
                </div>
            </div>
        @endif
    @endforeach
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
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function addToCart(route, productId) {
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
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
