<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
//        // dashboard
//        Gate::define('view_dashboard', function(User $user) {
//            return $user->hasPermissionTo('view dashboard');
//        });
//
//        // pages
//        Gate::define('create_edit_pages', function(User $user) {
//            return $user->hasPermissionTo('create and edit pages');
//        });
//
//        Gate::define('delete_pages', function(User $user) {
//            return $user->hasPermissionTo('delete pages');
//        });
//
//        Gate::define('wipe_pages', function(User $user) {
//            return $user->hasPermissionTo('permanently delete pages');
//        });
//
//        // components
//        Gate::define('create_edit_components', function(User $user) {
//            return $user->hasPermissionTo('create and edit components');
//        });
//
//        Gate::define('delete_components', function(User $user) {
//            return $user->hasPermissionTo('delete components');
//        });
//
//        Gate::define('wipe_components', function(User $user) {
//            return $user->hasPermissionTo('permanently delete components');
//        });
//
//        // media
//        Gate::define('add_media', function(User $user) {
//            return $user->hasPermissionTo('add media');
//        });
//
//        // settings
//        Gate::define('manage_settings', function(User $user) {
//            return $user->hasPermissionTo('manage users');
//        });
    }

}
