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

<table class="table align-middle mt-5">
    <thead>
      <tr>
        <th scope="col">Результаты</th>
      </tr>
    </thead>
    <tbody>
        @foreach($user->quizResults as $result)
        <tr><td>
            <div class="card p-2 my-2">                    
                <p><strong>Тема #{{$result->lesson->id}}: </strong>{{$result->lesson->name}}</p>
                <p class="mb-1"><strong>Результат теста: </strong>{{$result->correct_percentage}}% правильно</p>
            </div>
        </td></tr>
        @endforeach
    </tbody>
</table>

@endsection