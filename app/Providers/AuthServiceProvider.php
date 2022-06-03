<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        //
        Gate::define('is_user', function () {

            if(auth()->user()->id)
            {
                return true;
            }
            else{
                return false;
            }

           // return auth()->user()->id === $post->user_id;
            // if($post->user_id===auth()->user()->id)
            // {
                
            //     return true;
            // }
            // else{
            //     return false;
            // }
        });
    }
}
