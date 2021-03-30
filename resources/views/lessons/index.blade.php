@extends('layouts.app')

@section('title', 'Все темы')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Все темы</h1>
</div>

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<table class="table">
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
            <td>Не пройден</td>
            <td>
                <a href="{{route('lessons.show', $lesson->id)}}" class="btn btn-outline-primary">Открыть</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection