@extends('layouts.app')

@section('title', 'Все темы')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Доступные темы</h1>
</div>

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">Описание</th>
        <th scope="col">Результат теста</th>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
        <tr>
            <th scope="row">{{$lesson->id}}</th>
            <td style="max-width: 230px">{{$lesson->name}}</td>
            <td style="max-width: 330px">{{$lesson->description}}</td>
            <td>{{$lesson->quiz_result ? $lesson->quizResult->correct_percentage . "% правильно" : "Не пройден"}}</td>
            <td>
                <a href="{{route('lessons.show', $lesson->id)}}" class="btn btn-outline-primary openbtn">Открыть</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if (!$allLessonsCompleted)
    <div class="card border-warning mt-5">
        <div class="card-header">Внимание</div>
        <div class="card-body">
            <h6 class="card-text">Для доступа к следующей теме необходимо набрать в тесте как минимум {{$acceptable_percentage}}% правильных ответов</h6>
        </div>
    </div>
@endif

@endsection