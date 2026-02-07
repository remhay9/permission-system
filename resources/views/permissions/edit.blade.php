@extends('layouts.app')

@section('content')
<h3>Edit Permission</h3>

<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
