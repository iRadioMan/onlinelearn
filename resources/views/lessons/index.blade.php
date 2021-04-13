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
            <td>{{$lesson->name}}</td>
            <td>{{$lesson->description}}</td>
            <td>{{$lesson->quiz_result ? $lesson->quizResult->correct_percentage . "% правильно" : "Не пройден"}}</td>
            <td>
                <a href="{{route('lessons.show', $lesson->id)}}" class="btn btn-outline-primary">Открыть</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- если юзер не прошел все тесты -->
<div class="mt-4">
    <h6>Для доступа к следующей теме необходимо набрать в тесте как минимум {{$acceptable_percentage}}% правильных ответов</h6>
</div>
<!-- иначе не отображаем этот блок, а выдаем поздравление с успешным завершением обучения -->

@endsection