<?php

namespace App\Providers;

use App\Models\QuestionCategory;
use App\Models\Availability;
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

        Gate::define('change-availability', function (User $user) {
            return $user->is_admin === 1 || $user->is_counsellor === 1;
        });

        Gate::define('change-questions', function (User $user) {
            return $user->is_admin === 1 || $user->is_counsellor === 1;
        });
    }
}
