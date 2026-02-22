@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 flex items-center justify-center px-4">
    <div class="w-full max-w-lg">

        <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl p-10 border border-gray-100">

            {{-- Header Section --}}
            <div class="text-center mb-8">
                <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-blue-600 text-white text-2xl shadow-lg mb-4">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">
                    Account Access Request
                </h2>
                <p class="text-sm text-gray-500 mt-2">
                    Submit your request and our administrator will review it shortly.
                </p>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('requests.store') }}" class="space-y-6">
                @csrf

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Full Name
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm"
                        placeholder="Enter your full name">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm"
                        placeholder="example@company.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Reason --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Reason for Request
                    </label>
                    <textarea name="reason" rows="4"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm"
                        placeholder="Explain why you need system access...">{{ old('reason') }}</textarea>
                    @error('reason')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-md hover:shadow-lg transition duration-200">
                    Submit Access Request
                </button>
            </form>

            {{-- Footer --}}
            <div class="mt-8 text-center text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                    Sign in here
                </a>
            </div>

        </div>

        {{-- Copyright --}}
        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Permission System. All rights reserved.
        </p>

    </div>
</div>

