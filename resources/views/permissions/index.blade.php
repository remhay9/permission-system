@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Permissions</h3>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add Permission</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($permissions as $permission)
<tr>
    <td>{{ $permission->id }}</td>
    <td>{{ $permission->name }}</td>
    <td>
        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete permission?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
