@extends('layouts.app')

@section('title', 'Управление тестом')

@section('head')
    <script src="/js/app.js" defer></script>
@endsection

@section('content')
    <form method="POST" id="app" action="{{route('managequiz.update', $lesson->id)}}">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success fs-5" role="alert">
            {{session('success')}}
        </div>
        @endif
    
        @csrf
        @method('PATCH')
        <quiz-editor orig_lesson='{{json_encode($lesson->toArray())}}'></quiz-editor>
        <input type="submit" class="btn btn-outline-primary" value="Сохранить тест">
    </div>
@endsection