@extends('layouts/app')
@section('content')
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Role Name</th>
            <th>Permission Names</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>

                <td>@foreach($role->permissions as $permit){{ $permit->name }} || @endforeach
                </td>
                <td>
                    <a href="{{ route('role.edit', $role->id) }}">Edit</a>
                    <a href="{{ route('role.delete', $role->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('role.createForm') }}">Create New Role</a>
@endsection
