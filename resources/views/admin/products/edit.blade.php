@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Наименование" value="{{ $product->name }}"><br>
        <input type="text" name="description" placeholder="Описание" value="{{ $product->description }}"><br>
        <input type="text" name="price" placeholder="Стоимость" value="{{ $product->price }}"><br>
        <input type="text" name="quantity" placeholder="Количество" value="{{ $product->quantity }}"><br>
        <input type="text" name="country" placeholder="Страна" value="{{ $product->country }}"><br>
        <input type="text" name="category" placeholder="Категория" value="{{ $product->category }}"><br>
        <input type="text" name="model" placeholder="Модель" value="{{ $product->model }}"><br>
        <input type="text" name="year" placeholder="Год" value="{{ $product->year }}"><br>
        <input type="text" name="image_path" placeholder="Путь к изображению" value="{{ $product->image_path }}"><br>

        <button type="submit">Обновить</button>
    </form>
    @endsection
</body>
</html>
