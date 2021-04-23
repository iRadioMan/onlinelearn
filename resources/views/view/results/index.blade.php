@extends('layouts.app')

@section('title', 'Просмотр результатов')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Просмотр результатов</h1>
</div>

<table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">Студент</th>
        <th scope="col">Результаты</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            @if(!$user->isAdmin())
                <tr>
                    <td>{{$user->fullname}}</td>
                    <td>
                        @foreach($user->quizResults as $result)
                            <div class="card p-2 my-2">
                                <p><strong>Тема: </strong>{{$result->lesson->name}}</p>
                                <p><strong>Результат теста: </strong>{{$result->correct_percentage}}% правильно</p>
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection