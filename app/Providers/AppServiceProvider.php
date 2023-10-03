<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        $users = User::all();
//        $hasAdmin = 0;
//        foreach ($users as $user) {
//            if ($user->hasRole('admin')) {
//                $hasAdmin = 1;
//            }
//        }
//        if ($hasAdmin = 0) {
//            $admin = User::where('id', '1')->first();
//            $admin->assignRole('admin');
//        }
    }
}
