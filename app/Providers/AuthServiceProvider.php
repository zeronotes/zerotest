<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        \App\Post::class => \App\Policies\PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // admin, editor, author, member
        // chỉ cho phép admin có quyền sửa user
        Gate::define('edit-user', function($user) {
            if ($user->id == 1)
                return true;
            else
                return false;
        });

        Gate::before(function($user) {
            if ($user->group_id === 1) {
                return true;
            }
        });
    }
}
