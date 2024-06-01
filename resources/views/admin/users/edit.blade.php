
@extends('layouts.admin')

@section('content')
    <h1>Редактировать пользователя</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">
        <label for="login">Логин:</label>
        <input type="login" name="login" id="login" value="{{ $user->login }}">       
         <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" value="{{ $user->password }}">
        <button type="submit">Сохранить</button>
    </form>
@endsection
