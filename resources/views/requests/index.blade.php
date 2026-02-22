@extends('layouts.app')

@section('content')
<h3>User Registration Requests</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Reason</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($requests as $req)
<tr>
    <td>{{ $req->name }}</td>
    <td>{{ $req->email }}</td>
    <td>{{ $req->reason }}</td>
    <td>{{ ucfirst($req->status) }}</td>
    <td>
        @if($req->status === 'pending')
        <form method="POST" action="{{ route('request.register', $req->id) }}">
            @csrf
            <button class="btn btn-success btn-sm">
                Register User
            </button>
        </form>
        @else
            —
        @endif
    </td>
</tr>
@endforeach
</table>

