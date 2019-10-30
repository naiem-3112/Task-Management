@extends('layouts/app')
@section('content')
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>From</th>
            <th>To</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                <a href="">Edit</a>
                <a href="">Delete</a>
            </td>
        </tr>
            @endforeach
    </table>
    <a href="{{ route('user.createForm') }}">Create New user</a>
    @endsection
