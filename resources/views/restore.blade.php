@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')
    <form class="form-300px form-fullheight mb-1" method="POST" action="{{route('restore.update', '')}}">
        <h1 class="text-center mb-4">Восстановление пароля</h1>
        @csrf
        <div class="mb-3">
            <label for="inputLogin" class="form-label">Логин:</label>
            <input value="{{old('login')}}" type="text" class="form-control" id="inputLogin" name="login">
            @error('login')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputCode" class="form-label">Код восстановления:</label>
            <input value="{{old('code')}}" type="text" class="form-control" id="inputCode" name="code">
            @error('code')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Новый пароль:</label>
            <input value="{{old('password')}}" type="password" class="form-control" id="inputPassword" name="password">
            @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPasswordConfirm" class="form-label">Подтверждение пароля:</label>
            <input type="password" class="form-control" id="inputPasswordConfirm" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Изменить пароль</button>
    </form>
@endsection