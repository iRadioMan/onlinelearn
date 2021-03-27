@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
    <form class="form-300px form-fullheight mb-1" method="POST" action="{{route('auth.store')}}">
        <h1 class="text-center mb-4">Авторизация</h1>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="inputLogin" class="form-label">Логин:</label>
            <input type="text" class="form-control" id="inputLogin" name="login">
            @error('login')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Пароль:</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
            @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection
