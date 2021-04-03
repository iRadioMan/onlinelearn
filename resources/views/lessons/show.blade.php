@extends('layouts.app')

@section('title', 'Все темы')

@section('content')
<div class="d-flex flex-column mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('lessons.index')}}">Все темы</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$lesson->name}}</li>
        </ol>
    </nav>
    <div class="d-flex align-items-start justify-content-between">
        <div>
            <h1>{{$lesson->name}}</h1>
            <p>{{$lesson->description}}</p>
        </div>
        <a target="_blank" href="{{route('quiz.show', $lesson->id)}}" class="btn btn-outline-primary">Пройти тест</a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<div class="card p-2">
    <iframe style="height: 60vh;" src="/storage/lessons/{{$lesson->id}}" frameborder="0"></iframe>
</div>

@endsection