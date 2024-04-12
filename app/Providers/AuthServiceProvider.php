<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("projet.update", function ($user, $projet_user) {
            return $user->id === $projet_user->user_id;
        });

        Gate::define("projet.delete", function ($user, $projet_user) {
            return $user->id === $projet_user->user_id;
        });
        
        
        Gate::before(function($user, $ability){
            if($user->Admin && in_array($ability,["projet.update"])){
                return true;
            }
        });
        
    }
}
