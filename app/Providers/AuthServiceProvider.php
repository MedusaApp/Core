<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-user', function (User $authUser, User $user) {
            if ($authUser->id == $user->id) {
                return true;
            } elseif (Gate::allows('view-users', $authUser)) {
                return true;
            }

            return false;
        });

        Gate::define('update-user', function (User $authUser, User $user) {
            if ($authUser->id == $user->id) {
                return true;
            } elseif (Gate::allows('update-users')) {
                return true;
            }

            return false;
        });
    }
}
