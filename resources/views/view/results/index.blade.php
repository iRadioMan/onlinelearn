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
        <hr class="mb-0">
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            @if(!$user->isAdmin())
                <tr class="results-table">
                    <td class="fs-5">{{$user->fullname}}</td>
                    <td>
                        @if($user->quizResults->count() != 0)
                            @foreach($lessons as $lesson)
                                @if($user->lastQuizResult($lesson->id))
                                    <p class="mb-0"><strong>#{{$lesson->id}}</strong> - {{$user->lastQuizResult($lesson->id)->correct_percentage}}%</p>
                                    
                                    <!-- разбиение результатов по 4 строки -->
                                    @if(($lesson->id % 4) == 0)
                                        </td><td>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <p class="mb-0"><strong>Нет результатов</strong></p>                
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection