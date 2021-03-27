@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <form class="form-300px form-fullheight mb-1" method="POST" action="{{route('register.store')}}">
        <h1 class="text-center mb-4">Регистрация</h1>
        @csrf
        <div class="mb-3">
            <label for="inputFullname" class="form-label">ФИО:</label>
            <input value="{{old('fullname')}}" type="text" class="form-control" id="inputFullname" name="fullname">
            @error('fullname')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
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
            <label for="inputPassword" class="form-label">Пароль:</label>
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
        <div class="mb-3">
            <label for="inputGroup" class="form-label">Ваша группа:</label>
            <select id="inputGroup" required class="form-select" name="group_id">
                @foreach($groups as $group)
                <option @if(old("group_id") === $group->id) selected @endif value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            @error('group_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
@endsection
