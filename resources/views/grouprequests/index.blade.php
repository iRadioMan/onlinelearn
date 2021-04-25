@extends('layouts.app')

@section('title', 'Заявки в группы')

@section('head')
    <script src="/public/assets/js/manageGroup.js" defer></script>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
        <h1>Управление заявками</h1>
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
            <th scope="col">Пользователь</th>
            <th scope="col">Группа</th>
            <th scope="col">Дата</th>
            <th scope="col">Управление</th>
          </tr>
        </thead>
        <tbody>
            @foreach($groupRequests as $groupRequest)
            <tr>
                <th scope="row">{{$groupRequest->id}}</th>
                <td>{{$groupRequest->user->fullname}}</td>
                <td>{{$groupRequest->group->name}}</td>
                <td>{{$groupRequest->created_at}}</td>
                <td>
                    @if($groupRequest->status_id === 1)
                    <button 
                        data-bs-toggle="modal" 
                        data-bs-target="#approveModal" 
                        data-bs-fullname="{{$groupRequest->user->fullname}}" 
                        data-bs-requestid="{{$groupRequest->id}}" 
                        data-bs-groupname="{{$groupRequest->group->name}}" 
                        class="mx-1 my-1 btn btn-outline-success">Принять
                    </button>
                    <button 
                        data-bs-toggle="modal" 
                        data-bs-target="#rejectModal" 
                        data-bs-fullname="{{$groupRequest->user->fullname}}" 
                        data-bs-requestid="{{$groupRequest->id}}" 
                        data-bs-groupname="{{$groupRequest->group->name}}" 
                        class="mx-1 my-1 btn btn-outline-danger">Отклонить
                    </button>
                    
                    @endif

                    @if($groupRequest->status_id === 2)
                    <span class="text-success">Заявка принята.</span>
                    @endif

                    @if($groupRequest->status_id === 3)
                    <span class="text-danger">Заявка отклонена.</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
      

    <div class="modal fade" id="approveModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы уверены, что хотите принять запрос от "<span class="approve-fullname"></span>" в группу "<span class="approve-groupname"></span>"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <form action="{{route('grouprequests.update', '')}}" method="POST">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="status_id" value="2">
                        <input type="submit" class="btn btn-success" value="Принять">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы уверены, что хотите отклонить запрос от "<span class="reject-fullname"></span>" в группу "<span class="reject-groupname"></span>"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <form action="{{route('grouprequests.update', '')}}" method="POST">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="status_id" value="3">
                        <input type="submit" class="btn btn-danger" value="Отклонить">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
