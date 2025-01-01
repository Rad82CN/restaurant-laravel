<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
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
        // the validated data from the given form request data
        $validated = $request->validated();

        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('index')->with('success', 'User has been Registered successfully!');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(UserLoginRequest $request) {
        $validated = $request->validated();

        // if the users imported data that is trying to login is valid
        if(auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('index')->with('success', 'Logged in successfully!');
        }
    }

    public function logout() {
        auth()->logout();

        // regenrating/flushing session data and CSRF token
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Logged out successfully!');
    }
}
