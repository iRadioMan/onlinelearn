@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <p>Добро пожаловать на главную страницу электронного пособия по подготовке к демоэкзамену для направления ИСиП.</p>
    @guest
    <p>Пожалуйста, авторизуйтесь или зарегистрируйтесь.</p>
    @endguest

    @auth

    @if(
        !Illuminate\Support\Facades\Auth::user()->inGroup() && 
        Illuminate\Support\Facades\Auth::user()->lastGroupRequest
        )
    <div class="card p-4">
        <p>Ваш аккаунт ожидает подтверждения.</h3>
        <div>
            <span>Группа:</span>
            <b>{{Illuminate\Support\Facades\Auth::user()->lastGroupRequest->group->name}}</b>
        </div>
        @if(Illuminate\Support\Facades\Auth::user()->lastGroupRequest->status_id === 3)
            <p class="text-danger">Ваша заявка была отклонена. Вы можете отправить новую заявку:</p>
            @component('grouprequests.new-form')
            @endcomponent
        @endif
    </div>
    @endif
    @endauth

@endsection
