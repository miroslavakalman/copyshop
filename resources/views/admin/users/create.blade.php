
@extends('layouts.admin')

@section('content')
    <h1>Создать пользователя</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <label for="name">Имя:</label>
    <input type="text" name="name" id="name">
    <label for="surname">Фамилия:</label>
    <input type="text" name="surname" id="surname">
    <label for="patronymic">Отчество:</label>
    <input type="text" name="patronymic" id="patronymic">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <label for="login">Логин:</label>
    <input type="login" name="login" id="login">
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password">
    <button type="submit">Создать</button>
</form>

@endsection
