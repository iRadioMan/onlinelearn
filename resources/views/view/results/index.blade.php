@extends('layouts.app')

@section('title', 'Просмотр результатов')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Просмотр результатов</h1>
    <a target="_blank" href="{{route('export.create')}}" 
        class="btn btn-outline-primary mt-3 managebtn" style="flex-shrink: 0">Экспорт в Excel</a>
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
                    <td class="fs-5">{{$user->fullname}}</td>
                    <td>
                        @foreach($user->quizResults as $result)
                            <p class="mt-2"><strong>Тема #{{$result->lesson->id}}</strong> - {{$result->correct_percentage}}%</p>
                        @endforeach
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection