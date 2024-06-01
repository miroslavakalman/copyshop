@extends('layouts.admin')

@section('content')
    <h1>Список пользователей</h1>
    <a href="{{ route('admin.users.create') }}">Создать</a>

    <table>
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}">Просмотр</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}">Редактировать</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
