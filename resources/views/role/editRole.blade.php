@extends('layouts/app')
@section('content')
    <form action="{{ route('role.update', $editRoles->id) }}" method="post">
        @csrf

        <div class="form-group col-8">
            <label for="from">Name</label>
            <input class="form-control col-6 " type="text" name="name" value="{{ $editRoles->name }}">
            @if($errors->has('name'))
                <strong style="color: red">{{ $errors->first('name') }}</strong><br>
            @endif
            <label for="from">Permission</label><br>
            @foreach($permissions as $permission)
                <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                       @foreach($editRoles->permissions as $permit)
                       @if($permit->id == $permission->id)
                       checked
                    @endif

                    @endforeach
                >{{ $permission->name }}<br>
            @endforeach
            @if($errors->has('permission'))
                <strong style="color: red">{{ $errors->first('permission') }}</strong><br>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
