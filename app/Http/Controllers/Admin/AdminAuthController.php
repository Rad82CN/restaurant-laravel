<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login() {
        return view('admin.admins.login-admins');
    }

    public function authenticate(AdminLoginRequest $request) {
        // Authorizing that the user is admin or not
        // $this->authorize('adminAuth');

        $validated = $request->validated();

        // if the users imported data that is trying to login is valid
        if(auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('admin.index')->with('success', 'successfully Logged in as Admin!');
        }
    }
}
