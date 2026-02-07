@extends('layouts.app')

@section('content')
<h3>Edit Role</h3>

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
    </div>
    <div class="mb-3">
        <label>Permissions</label><br>
        @foreach($permissions as $perm)
        <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"
        {{ $role->hasPermissionTo($perm->name)?'checked':'' }}> {{ $perm->name }} <br>
        @endforeach
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
