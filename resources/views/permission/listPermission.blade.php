@extends('layouts/app')
@section('content')
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Permission Name</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ route('permission.edit', $permission->id) }}">Edit</a>
                    <a href="{{ route('permission.delete', $permission->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('permission.createForm') }}">Create New Permission</a>
@endsection
