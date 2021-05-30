@extends('layouts.app')

@section('title', 'Cправочная система')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
    <h1>Справочная система</h1>
</div>

<table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col" style="text-align: center">Действия</th>
      </tr>
    </thead>
    <tbody>
        @foreach($helpPages as $helpPage)
        <tr>
            <th scope="row">{{$helpPage->id}}</th>
            <td style="max-width: 230px">{{$helpPage->name}}</td>
            <td style="text-align: center">
                <a href="{{route('help.show', $helpPage->id)}}" class="btn btn-outline-primary openbtn">Открыть</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection