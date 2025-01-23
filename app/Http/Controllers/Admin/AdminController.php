<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index() {
        $admins = User::where('is_admin', 1)->get();

        return view('admin.admins.admins', compact('admins'));
    }

    public function update($user) {
        // convert an admin to a regular user
        $user = User::findOrFail($user);

        if($user->is_admin == 1) {
            $user['is_admin'] = 0;

            $user->update();

            return redirect()->route('admins.index')->with('success', 'The chosen user has been removed from the admins');
        } else {
            return redirect()->route('admins.index')->with('error', 'The chosen user is not an admin at all!');
        }
    }
}
