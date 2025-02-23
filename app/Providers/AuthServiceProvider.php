<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Enums\UserRole;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate as FacadesGate;

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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineUserRoleGate('isAdmin', UserRole::ADMIN);
        $this->defineUserRoleGate('isUser', UserRole::USER);
    }

    private function defineUserRoleGate(string $name, string $role)
    {
        FacadesGate::define($name, function($user) use($role){
            return $user->role == $role;
        });
    }
}
