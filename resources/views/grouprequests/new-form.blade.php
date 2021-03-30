<form class="card p-3 form-300px" style="margin: 0;" method="POST" action="{{route('auth.regroup')}}">
    @csrf
    <label for="inputGroup" class="form-label">Ваша группа:</label>
    <select id="inputGroup" required class="form-select" name="group_id">
        @foreach(App\Models\UserGroup::all() as $group)
        <option @if(old("group_id") === $group->id) selected @endif value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
    </select>
    @error('group_id')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror
    <input type="submit" value="Отправить" class="btn btn-primary mt-3">
</div>
