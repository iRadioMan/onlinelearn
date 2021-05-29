@extends('layouts.app')

@section('title', 'Прогресс обучения')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Прогресс обучения</h1>
</div>

<div class="mt-4">
    <div class="progress">
        <div class="progress-bar student-progress-bar progress-bar-striped bg-info" 
            role="progressbar" 
            style="width: {{$completedLessonsCount / $lessonsCount * 100}}%" 
            aria-valuenow="{{$completedLessonsCount}}" 
            aria-valuemin="0" 
            aria-valuemax="{{$lessonsCount}}"></div>
    </div>
    <h4 class="student-progress-text mt-2">Пройдено тем: {{$completedLessonsCount}} из {{$lessonsCount}}</h4>
</div>

@if($completedLessonsCount == $lessonsCount)
    <div class="card text-white bg-success mt-4 box-shadow-1">
        <div class="card-header">Обучение завершено</div>
        <div class="card-body">
            <h5 class="card-text">Поздравляем с успешным завершением обучения! Сообщите об этом своему преподавателю
                <a href="public/ps/index.htm"><img src="/assets/img/check2-square.svg"></a>
            </h5>
        </div>
    </div>
@endif

<table class="table align-middle mt-5">
    <thead>
      <tr>
        <th scope="col">Результаты</th>
      </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
        @if($user->lastQuizResult($lesson->id))
            <tr><td>
                <div class="card p-2 my-2">                    
                    <p><strong>Тема #{{$lesson->id}}: </strong>{{$lesson->name}}</p>
                    <p class="mb-1"><strong>Результат теста: </strong>{{$user->lastQuizResult($lesson->id)->correct_percentage}}% правильно</p>
                </div>
            </td></tr>
        @endif
        @endforeach
    </tbody>
</table>

@endsection