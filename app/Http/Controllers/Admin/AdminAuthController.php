<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login() {
        return view('admin.admins.login-admins');
    }

    public function authenticate(AdminLoginRequest $request) {
        $validated = $request->validated();

        // if the users imported data that is trying to login is valid
        if(auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('admin.index')->with('success', 'successfully Logged in as Admin!');
        }
    }
}
