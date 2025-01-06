<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserAdminPolicy
{
    // for admin login authentication
    public function adminAuth(User $user)
    {
        $user = $_POST[$user];
        
        return ($user->is_admin);
    }
}
