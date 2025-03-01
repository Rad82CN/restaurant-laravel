<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Food;
use App\Models\User;
use App\Policies\FoodPolicy;
use App\Policies\UserAdminPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Food::class => FoodPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
