<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Movie;
use Laravel\Passport\Passport;
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


        //defining gate for delete only for auth user
        Gate::define('delete-movie', function(User $user, Movie $movie) {
            
            return $user->id === $movie->user_id;
        });

        //defining gate for update only for authenticated user
        Gate::define('update-movie', function(User $user, Movie $movie) {
            
            return $user->id === $movie->user_id;
        });

        Passport::routes();
    }
}
