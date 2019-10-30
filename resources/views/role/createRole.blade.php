@extends('layouts/app')
@section('content')
    <form action="{{ route('role.create') }}" method="post">
        @csrf

        <div class="form-group col-8">
            <label for="from">Name</label>
            <input class="form-control col-6 " placeholder="Role name..." type="text" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <strong style="color: red">{{ $errors->first('name') }}</strong><br>
            @endif

            <label for="from">Permission</label><br>
            @foreach($permissions as $permission)
            <input type="checkbox" name="id[]" value="{{ $permission->id }}">{{ $permission->name }}<br>
            @endforeach
            @if($errors->has('permission'))
                <strong style="color: red">{{ $errors->first('permission') }}</strong><br>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection
