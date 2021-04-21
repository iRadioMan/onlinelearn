@extends('layouts.app')

@section('title', 'Управление тестом')

@section('head')
    <script src="/js/app.js" defer></script>
@endsection

@section('content')
    <form method="POST" id="app" action="{{route('managequiz.update', $lesson->id)}}">
        @csrf
        @method('PATCH')
        <input type="submit" class="btn btn-outline-primary" value="Сохранить">
        <quiz-editor orig_lesson='{{json_encode($lesson->toArray())}}'></quiz-editor>
    </div>
@endsection