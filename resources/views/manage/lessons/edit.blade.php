@extends('layouts.app')

@section('title', 'Редактирование темы')

@section('content')
<form class="form-600px form-fullheight" method="POST" action="{{route('managelessons.update', $lesson->id)}}">
    @csrf
    @method('PATCH')
    <h1 class="text-center">Редактирование темы</h1>
    <div class="mb-3">
      <label for="name" class="form-label">Название:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$lesson->name}}">
      @error('name')
      <div class="alert alert-danger" role="alert">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание:</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$lesson->description}}</textarea>
        @error('description')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="main_file" class="form-label">Стартовая страница:</label>
        <input type="text" class="form-control" name="main_file" id="main_file" value="{{$lesson->main_file}}">
        @error('main_file')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </form>
  
@endsection
