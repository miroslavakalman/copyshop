@extends('layouts.app')

@section('content')
    <h1>Корзина</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Товар</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>
                        <form action="{{ route('cart.increase', $item->product_id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">+</button>
                        </form>
                        <form action="{{ route('cart.decrease', $item->product_id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning">-</button>
                        </form>
                        <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="address" class="form-label">Адрес</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="phone" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Оформить заказ</button>
    </form>
@endsection
