@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    @guest
    @if(session('success'))
    <div class="alert alert-success fs-5" role="alert">
        {{session('success')}}
    </div>
    @endif

    <p>Добро пожаловать!</p>
    <p>Пожалуйста, авторизуйтесь или зарегистрируйтесь.</p>

    @endguest

    @auth
    
    <p>Добро пожаловать, {{ Illuminate\Support\Facades\Auth::user()->fullname }}!</p>

    @if(
        !Illuminate\Support\Facades\Auth::user()->inGroup() && 
        Illuminate\Support\Facades\Auth::user()->lastGroupRequest
        )
    <div class="card p-4 mb-4">
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

    <div class="p-2">
        <img class="welcome-pic" src="/public/assets/img/online-learning.svg">
    </div>

    @endauth

    <div class="card text-dark bg-light my-3 box-shadow-1">
        <div class="card-header">О приложении</div>
        <div class="card-body">
          <h5 class="card-title">Что такое ЭППКД ИСиП?</h5>
          <p class="card-text">
              ЭППКД ИсИП - это электронное учебное пособие по подготовке студентов групп ИСиП к демоэкзамену по стандартам WorldSkills.<br>
              Приложение рассчитано на быстрое освоение курса "Программные решения для бизнеса". Оно имеет удобный, максимально простой
              и отзывчивый адаптивный интерфейс, высокую скорость работы. Информация полностью обрабатывается на сервере, 
              клиенту лишь выдается готовая веб-страница. Приложение будет отлично работать даже на ПК с низкой производительностью.<br>
              <br><strong>Системные требования:</strong>
              <ul>
                <li>Любой браузер последней версии - Google Chrome, Opera, Firefox, Safari, Microsoft Edge
                <li>Разрешение дисплея 1280x720 и выше (рекомендуется 1920x1080)
                <li>Соединение с интернетом
              </ul>
              <br>
              
              <table><tr>
              <td width="10%"><img src="/public/assets/img/asiec.png"></td>
              <td><strong>Данное веб-приложение является выпускной квалификационной работой студента Дудикова Ильи Витальевича</strong>
                <br>Группа 11ПО181<br>КГБПОУ "Алтайский Промышленно-Экономический Колледж"</td>
              </tr></table>
            </p>
        </div>
    </div>

@endsection
