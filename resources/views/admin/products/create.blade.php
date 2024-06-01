@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Наименование:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="description">Описание:</label><br>
        <textarea id="description" name="description"></textarea><br>

        <label for="category">Категория:</label><br>
        <input type="text" id="category" name="category"><br>

        <label for="country">Страна:</label><br>
        <input type="text" id="country" name="country"><br>

        <label for="model">Модель:</label><br>
        <input type="text" id="model" name="model"><br>

        <label for="year">Год производства:</label><br>
        <input type="text" id="year" name="year"><br>

        <label for="price">Стоимость:</label><br>
        <input type="text" id="price" name="price"><br>

        <label for="quantity">Количество в наличии:</label><br>
        <input type="text" id="quantity" name="quantity"><br>

        <label for="image_path">Изображение:</label><br>
        <input type="text" id="image_path" name="image_path"><br>

        <button type="submit">Добавить</button>
    </form>
    @endsection
</body>
</html>
