@extends('layouts/app')
@section('content')
    <form action="{{ route('permission.create') }}" method="post">
        @csrf

        <div class="form-group col-8">
            <label for="from">Name</label>
            <input class="form-control col-6 " placeholder="Role name..." type="text" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <strong style="color: red">{{ $errors->first('name') }}</strong><br>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection
