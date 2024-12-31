<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store(UserRegisterRequest $request) {
        // the validated data from the given form request
        $validated = $request->validated();

        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('index')->with('success', 'User has been Registered successfully!');
    }

    public function login() {
        //
    }

    public function authenticate() {
        //
    }

    public function logout() {
        //
    }
}
