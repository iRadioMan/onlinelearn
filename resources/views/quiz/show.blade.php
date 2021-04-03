@extends('layouts.app')

@section('title', 'Тест')

@section('content')
<div class="d-flex flex-column mb-4">
    <div class="d-flex align-items-start justify-content-between">
        <div>
            <h1>Тест по теме "{{$lesson->name}}"</h1>
        </div>
    </div>
</div>

<div class="px-5">
    @foreach ($lesson->questions as $question)
        <div class="card m-4 p-3">
    
            <h5>{{$question->description}}</h5>
            
            <div class="ps-4 pt-4">
                @foreach ($question->question_options as $question_option)
                    <p><input class="form-check-input" type="checkbox" 
                        value="{{$question_option->correct}}}">
                        {{$question_option->description}}<br>
                    </p> 
                @endforeach
            </div>

        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center py-3">
    <a 
        href="#" 
        class="btn btn-outline-primary"
        data-bs-toggle="modal" 
        data-bs-target="#endQuizModal" 
    >Завершить тест</a>
</div>

<div class="modal fade" id="endQuizModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подтверждение</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Завершить тест и отправить ответы на сервер?</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="POST">
                    @csrf
                    <input id="modalEndQuizButton" type="submit" class="btn btn-outline-danger" value="Отправить">
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>

@endsection