    
@extends('layouts.admin')

@section('content')
    <h1>Пользователь: {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>имя: {{ $user->name }}</p> 
    <p>фамилия: {{ $user->surname }}</p>
    <p>отчество: {{ $user->patronymic }}</p> 
    <p>log: {{ $user->login }}</p>
    <p>passw: {{ $user->password }}</p>     
    <p>Дата создания: {{ $user->created_at }}</p>
@endsection
