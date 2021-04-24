@extends('layouts.app')

@section('title', 'Изучение темы')

@section('content')
<div class="d-flex flex-column mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('lessons.index')}}">Темы</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$lesson->name}}</li>
        </ol>
    </nav>
    <div class="d-flex align-items-start justify-content-between">
        <div>
            <h1>{{$lesson->name}}</h1>
            <p>{{$lesson->description}}</p>
        </div>

        @if(!$nextLessonIsAccessible)
            <a target="_blank" href="{{route('quiz.show', $lesson->id)}}" 
                class="btn btn-outline-primary mt-3" style="flex-shrink: 0">Пройти тест</a>
        @endif
        
    </div>
</div>

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<div class="card p-2">
    <iframe style="height: 65vh;" src="/storage/lessons/{{$lesson->id}}" frameborder="0"></iframe>
</div>

@endsection