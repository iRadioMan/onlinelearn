@extends('layouts.app')

@section('title', 'Управление тестом')

@section('head')
    <script src="/js/app.js" defer></script>
@endsection

@section('content')
    <form method="POST" id="app" action="{{route('managequiz.update', $lesson->id)}}">
        @csrf
        @method('PATCH')
        <quiz-editor orig_lesson='{{json_encode($lesson->toArray())}}'></quiz-editor>
        <input type="submit" class="btn btn-outline-danger" value="Сохранить тест">
    </div>
@endsection