@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Roles</h3>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Permissions</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($roles as $role)
<tr>
    <td>{{ $role->id }}</td>
    <td>{{ $role->name }}</td>
    <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
    <td>
        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete role?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
