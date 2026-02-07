@extends('layouts.app')

@section('content')
<h3>Create Permission</h3>

<form action="{{ route('permissions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button class="btn btn-success">Create</button>
    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
