@extends('layouts.app')

@section('content')
<h3>Create Role</h3>

<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Permissions</label><br>
        @foreach($permissions as $perm)
        <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"> {{ $perm->name }} <br>
        @endforeach
    </div>
    <button class="btn btn-success">Create</button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
