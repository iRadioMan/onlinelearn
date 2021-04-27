@extends('layouts.app')

@section('title', 'Профиль пользователя')

@section('content')

<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Профиль пользователя</h1>
</div>

@if(session('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
@endif

<div style="width: 29rem;">
    <img src="/public/assets/img/Student-id.png" class="profile-img" alt="Профиль">
    <div class="card-body">
      <h5 class="card-title">{{Illuminate\Support\Facades\Auth::user()->fullname}}</h5>
      @if(Illuminate\Support\Facades\Auth::user()->inGroup())
        <p class="card-text">{{Illuminate\Support\Facades\Auth::user()->group->name}}</p>
      @endif
    </div>
    <hr>
    <div class="card-body">
      <form class="my-2" method="POST" action="{{route('password.update')}}">
        <h5 class="mb-4">Изменение пароля:</h5>
        @csrf
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
    </div>
</div>

@endsection