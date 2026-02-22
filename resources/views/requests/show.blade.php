@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">

    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Account Request Details</h2>

        <p><b>Name:</b> {{ $request->name }}</p>
        <p><b>Email:</b> {{ $request->email }}</p>
        <p><b>Role:</b> {{ $request->role }}</p>
        <p><b>Status:</b> {{ ucfirst($request->status) }}</p>

        @if($request->status === 'pending')
            <form method="POST" action="{{ route('request.approve', $request->id) }}" class="mt-4">
                @csrf
                <button class="bg-green-600 text-white px-4 py-2 rounded">
                    Approve & Register
                </button>
            </form>

            <form method="POST" action="{{ route('request.reject', $request->id) }}" class="mt-2">
                @csrf
                <button class="bg-red-600 text-white px-4 py-2 rounded">
                    Reject
                </button>
            </form>
        @endif
    </div>

</div>

