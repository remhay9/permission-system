@extends('layouts.app')

@section('content')
<h3>Edit User</h3>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" {{ $user->hasRole($role->name)?'selected':'' }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
