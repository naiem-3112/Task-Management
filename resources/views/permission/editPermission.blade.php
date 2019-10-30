@extends('layouts/app')
@section('content')
    <form action="{{ route('permission.update', $editPermissions->id) }}" method="post">
        @csrf

        <div class="form-group col-8">
            <label for="from">Name</label>
            <input class="form-control col-6 " type="text" name="name" value="{{ $editPermissions->name }}">
            @if($errors->has('name'))
                <strong style="color: red">{{ $errors->first('name') }}</strong><br>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
