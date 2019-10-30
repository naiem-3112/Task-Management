@extends('layouts/app')
@section('content')
    <form action="{{ route('user') }}" method="post">
        @csrf

        <div class="form-group col-8">
            <label for="from">Name</label>
            <input class="form-control col-6 " type="text" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <strong style="color: red">{{ $errors->first('name') }}</strong><br>
            @endif


            <label for="email">Email</label>

            <input class="form-control col-6 " type="text" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <strong style="color: red">{{ $errors->first('email') }}</strong><br>
            @endif


            <label for="from">From</label>
            <input class="form-control col-6 " type="text" name="from" value="{{ old('from') }}">
            @if($errors->has('from'))
                <strong style="color: red">{{ $errors->first('from') }}</strong><br>
            @endif


            <label for="to">To</label>
            <input class="form-control col-6 " type="text" name="to" value="{{ old('to') }}">
            @if($errors->has('to'))
                <strong style="color: red">{{ $errors->first('to') }}</strong><br>
            @endif


            <label for="password">Password</label>
            <input class="form-control col-6 " type="password" name="password">
            @if($errors->has('password'))
                <strong style="color: red">{{ $errors->first('password') }}</strong>
            @endif

            <label for="role">Role</label>
            <select class="form-control col-6" name="role">
                <option selected disabled>Select Student Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
                <strong style="color: red">{{ $errors->first('role') }}</strong>
            @endif

            {{--<label for="role">Role</label>
            <select class="form-control col-6 " name="role">
                <option selected disabled>Select User Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
                <strong style="color: red">{{ $errors->first('role') }}</strong>
            @endif--}}

        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection
