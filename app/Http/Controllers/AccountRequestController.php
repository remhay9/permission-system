<?php

namespace App\Http\Controllers;

use App\Models\AccountRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AccountRequestController extends Controller
{
    // -------------------------------
    // PUBLIC: Show request form
    // -------------------------------
    // Show request form
    public function create()
    {
        return view('requestS.create'); // resources/views/request/create.blade.php
    }

    // Store request
    public function store(Request $request)
    {
        // 1️⃣ Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // 2️⃣ Check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Your account has not been created yet. Please request approval from admin.'
            ])->onlyInput('email');
        }
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'reason' => 'required',
        ]);

        AccountRequest::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect('/login')
            ->with('success', 'Your request has been sent to the admin.');
    }

    // -------------------------------
    // PUBLIC: Store request
    // -------------------------------
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'   => 'required',
    //         'email'  => 'required|email|unique:account_requests,email|unique:users,email',
    //         'reason' => 'required',
    //     ]);

    //     AccountRequest::create([
    //         'name'   => $request->name,
    //         'email'  => $request->email,
    //         'reason' => $request->reason,
    //         'status' => 'pending',
    //     ]);

    //     return redirect('/login') // or wherever your login page is
    //         ->with('success', 'Your account request has been sent to the admin.');
    // }

    // -------------------------------
    // ADMIN: View all pending requests
    // -------------------------------
    public function index()
    {
        $requests = AccountRequest::where('status', 'pending')->get();
        return view('request.index', compact('requests'));
    }

    // -------------------------------
    // ADMIN: Approve request
    // -------------------------------
    public function approve($id)
    {
        $request = AccountRequest::findOrFail($id);

        // Create user account
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password123'), // default password
        ]);

        // ✅ Create roles if they don't exist
        Role::firstOrCreate(['name' => 'User']);
        Role::firstOrCreate(['name' => 'Admin']);

        // ✅ Assign the "User" role to this new account
        $user->assignRole('User');

        // Update request status
        $request->update(['status' => 'approved']);

        return redirect()->route('requests.index')
            ->with('success', 'User approved and role assigned.');
    }

}