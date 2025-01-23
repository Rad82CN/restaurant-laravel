<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index() {
        $users = User::where('is_admin', 0)->get();

        return view('admin.admins.users', compact('users'));
    }

    public function update($user) {
        // convert a user to an admin
        $user = User::findOrFail($user);

        if($user->is_admin == 0) {
            $user['is_admin'] = 1;

            $user->update();

            return redirect()->route('admins.index')->with('success', 'The chosen user is an Admin now!');
        } else {
            return redirect()->route('admins.index')->with('error', 'The user is already an Admin!');
        }
    } 
}
