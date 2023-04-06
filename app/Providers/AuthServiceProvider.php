<?php

namespace App\Providers;

 use App\Policies\ModeratorPolicy;
 use Illuminate\Support\Facades\Gate;
use App\Models\Hotel;
use App\Models\User;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => ModeratorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

//        Gate::before(function (User $user) {
//            return $user->role_id === 1;
//        });
    }
}
