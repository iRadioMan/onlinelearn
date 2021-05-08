@extends('layouts.app')

@section('title', $helpPage->name)

@section('content')
<div class="d-flex flex-column mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('help.index')}}">Справочная система</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$helpPage->name}}</li>
        </ol>
    </nav>
    <div class="d-flex align-items-start justify-content-between">
        <div>
            <h4>{{$helpPage->name}}</h4>
        </div>        
    </div>
</div>

<div class="card p-2">
    <iframe style="height: 70vh;" src="/storage/help/{{$helpPage->main_file}}" frameborder="0"></iframe>
</div>

@endsection