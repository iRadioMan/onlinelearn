@extends('layouts.app')

@section('title', 'Управление темами')

@section('head')
<script src="/public/assets/js/manageLesson.js" defer></script>
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Управление темами</h1>
    <a class="btn btn-outline-primary" href="{{route('managelessons.create')}}" target="_blank">Добавить</a>
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
        <th scope="col">Стартовая страница</th>
        <th scope="col">Управление</th>
      </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
        <tr>
            <th scope="row">{{$lesson->id}}</th>
            <td>{{$lesson->name}}</td>
            <td>{{$lesson->description}}</td>
            <td>{{$lesson->main_file}}</td>
            <td>
                <a href="{{route('managelessons.edit', $lesson->id)}}" class="btn btn-outline-primary mb-3" target="_blank">Редактировать тему</a>
                <a href="{{route('managequiz.edit', $lesson->id)}}" class="btn btn-outline-primary mb-3" target="_blank">Редактировать тест</a>
                <a 
                href="#" 
                class="btn btn-outline-danger"
                data-bs-toggle="modal" 
                data-bs-target="#deleteModal" 
                data-bs-delId="{{$lesson->id}}" 
                data-bs-lessonName="{{$lesson->name}}"
                >Удалить тему</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подтверждение</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить тему "<span class="delete-fullname"></span>"?</p>
                <p class="text-danger">После удаления все связанные с темой тесты и результаты студентов будут безвозвратно удалены!</p>
                <p>Для подтверждения введите слово "удалить"</p>
                <input class="form-control" type="text" id="modalDeleteWord" placeholder='Введите слово "удалить"'>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <form action="{{route('managelessons.destroy', '')}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input id="modalDeleteButton" type="submit" class="btn btn-danger" value="Удалить" disabled>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
